
<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>
<html>
    <head>
        <meta charset ="utf-8" />
        <title>Blog de informatica</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/styles.css"/>
    </head>
    <body>

        <!-- CABECERA -->
        <header id="header">
                
        <!-- LOGO -->
            <div id="logo"> 
                <a href="index.php">
                    <h1>Blog de informatica</h1>
                </a>
            </div> 
        <!-- MENU -->

            <nav id="nav">
                <ul>
                    <li> <a href="index.php">Inicio</a> </li>
                    
                    <?php 
                    $categorias = GetCategorias($db);
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):        
                    ?>
                    
                    <li><a href="categorias.php?id=<?= $categoria['id']?>"><?= $categoria['nombre']?></a></li>
                    
                    <?php endwhile;
                          endif; ?>
                    <li> <a href="sobre-mi.php">Sobre mi</a> </li>
                    
                </ul>

            </nav>       
        <div class="clearfix"></div> 
        </header>
        
        <div id="container">

