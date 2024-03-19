<?php

//Conexion
$server = "localhost"; //Servidor
$username = "root"; //Usuario
$password = ""; //Contraseña
$database = "blog"; //Nombre de la base de datos

//Conexion a la base de datos
$db = mysqli_connect($server, $username, $password, $database);
//Validacion de caracteres especiales
mysqli_query($db, "SET NAMES 'utf8'");
//Inicio de sesion
session_start();