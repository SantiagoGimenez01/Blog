<?php

//Inicio de sesion y conexion a base de datos
require_once './includes/conexion.php';

//Recoleccion de los datos del formulario
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

//Comprobamos que el usuario haya ingresado el email correctamente
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$login = mysqli_query($db, $sql);

if($login && mysqli_num_rows($login) == 1){
    $usuario = mysqli_fetch_assoc($login);
    
    //Comprobamos que la contraseña del usuario sea correcta
    $verify = password_verify($password, $usuario['password']);
    
    if($verify){
        //Sesion usuario logeado
        $_SESSION['usuario'] = $usuario;
        
        if(isset($_SESSION['error_login'])){
            unset($_SESSION['error_login']);
        }
        
    } else {
        //Error
        $_SESSION['error_login'] = 'Error al logearse';
    }
    
}else{
    //Error
       $_SESSION['error_login'] = 'Error al logearse';
}

}
//Redirigir al index
header("Location: index.php");
    
    
    
    
