<?php

if(isset($_POST)){
    //Conexion a base de datos
    require_once './includes/conexion.php';
    require_once './includes/helpers.php';
     //Iniciamos sesion si es que no hay una ya iniciada
    IniciarSesion();
    
    //Toma de datos y escape de strings
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;       
}

//Array de errores
$errores = array();

 //Validacion de datos
//Nombre
if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
    $nombre_validado = true; //Validacion correcta
}else{
    $nombre_validado = false; //Error de validacion
    $errores['nombre'] = "El nombre no es valido"; //Tipo de error
}
//Apellidos
if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
    $apellidos_validado = true; //Validacion correcta
}else{
    $apellidos_validado = false; //Error de validacion
    $errores['apellidos'] = "El apellido no es valido"; //Tipo de error
}
//Email
if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_validado = true; //Validacion correcta
}else{
    $email_validado = false; //Error de validacion
    $errores['email'] = "El email no es valido"; //Tipo de error
}
//Contraseña
if(!empty($password) && is_string($password) && strlen($password) > 8 && preg_match("/[0-9]/", $password)){
    $password_validado = true; //Validacion correcta
}else{
    $password_validado = false; //Error de validacion
    $errores['password'] = "La password no es valida"; //Tipo de error
}

//Seteamos inicialmente en 0 la variable que habilita el guardado de usuarios
$guardar_usuario = false; //0

//Si no existen errores en el array de errores habilitamos la variable que guarda los usuarios que se registraron
if(count($errores) == 0){
    $guardar_usuario = true; //1
    
    //Cifrado de contraseñas
    $password_encriptada = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
 
    //Registro en base de datos
    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_encriptada', CURDATE())";
    $query = mysqli_query($db, $sql);
    
    if($query){
        $_SESSION['completado'] = "El registro se realizo correctamente";
    }else{
        $_SESSION['errores']['general'] = "Hubo una falla en el registro";
    }
}else{
    $_SESSION['errores'] = $errores;
    header("Location:index.php");
}

?>