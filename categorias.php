<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
    $categoria_actual = GetCategoria($db, $_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location:index.php");
    }
?>

<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>     
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

        <!-- CAJA PRINCIPAL -->
        <div id="main-box">

            <h1>Entradas de <?=$categoria_actual['nombre']?></h1>
            <?php 
                $entradas = GetAllEntradas($db, $_GET['id']);
                if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                    while($entrada = mysqli_fetch_assoc($entradas)):
            ?>
            <article class="inputs">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                <h2><?= $entrada['titulo']?></h2>
                <span style="color: gray"><?= $entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                    <?= substr($entrada['descripcion'], 0, 300)?>
                </p>
                </a>
            </article>
            <?php
                endwhile;
                else:
            ?>
            <div class="alert alert-exito"> No hay entradas en esta categoria </div>
            <?php endif ?>
        </div>   
        <!-- FOOTER -->
         <?php require_once 'includes/footer.php';?>
