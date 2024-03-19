<?php

if(isset($_POST)){
    //Conexion a base de datos
    require_once './includes/conexion.php';
    
    //Toma de datos y escape de strings
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;       
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

//Seteamos inicialmente en 0 la variable que habilita el guardado de usuarios
$guardar_usuario = false; //0

//Si no existen errores en el array de errores habilitamos la variable que guarda los usuarios que se registraron
if(count($errores) == 0){
    $guardar_usuario = true; //1
    
    //Comprobar que el email actualizado no exista ya en la base de datos
    $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
    $isset_email = mysqli_query($db, $sql);
    $isset_user = mysqli_fetch_assoc($isset_email);
    if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
    //Actualizacion en base de datos
    $usuario = $_SESSION['usuario'];
    $sql = "UPDATE usuarios SET ".
           "nombre = '$nombre', ".
           "apellidos = '$apellidos', ".
           "email = '$email' ".
           "WHERE id = ".$_SESSION['usuario']['id'];
    $query = mysqli_query($db, $sql);
    
    if($query){
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellidos'] = $apellidos;
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['completado'] = "Tus datos se actualizaron correctamente";
    }else{
        $_SESSION['errores']['general'] = "Hubo una falla en la actualizacion";
    }
    }else{
        $_SESSION['errores']['general'] = "El email ingresado ya esta en uso";       
    }
}else{
    $_SESSION['errores'] = $errores;
    header("Location:mis-datos.php");
}
    header("Location:mis-datos.php");
?>

