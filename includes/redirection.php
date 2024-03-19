<?php

 //Iniciamos sesion si es que no hay una ya iniciada
IniciarSesion();

if(!isset($_SESSION['usuario'])){
    header("Location::index.php");
}

?>