<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $entrada_actual = GetEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location:index.php");
    }
?>

<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>     
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

        <!-- CAJA PRINCIPAL -->
        <div id="main-box">

            <h1><?=$entrada_actual['titulo']?></h1>
            <h2><?=$entrada_actual['categoria']?></h2>
            <h4><?=$entrada_actual['fecha']?> | <?= $entrada_actual['usuario']?></h4>
            <br> 
            <p><?=$entrada_actual['descripcion']?></p>
            
            <?php
            if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']):
            ?>
                <a href="edit-entrada.php" class="button">Editar entrada</a> 
                <a href="delete-entrada.php?id=<?=$entrada_actual['id']?>" class="button">Borrar entrada</a>
            <?php
            endif;
            ?>
            
        </div>   
        <!-- FOOTER -->
         <?php require_once 'includes/footer.php';?>
