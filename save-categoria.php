<?php
require_once 'includes/helpers.php';
if(isset($_POST)){
    
   //Conexion a base de datos
    require_once './includes/conexion.php';
    
    IniciarSesion();
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    //Array de errores
    $errores = array();

    //Validacion de datos
    //Nombre
    if(!empty($nombre) && !is_numeric($nombre)){
        $nombre_validado = true; //Validacion correcta
    }else{
        $nombre_validado = false; //Error de validacion
        $errores['nombre'] = "El nombre no es valido"; //Tipo de error
    }
    
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $query = mysqli_query($db, $sql);
    }
    
}
header("Location:index.php");