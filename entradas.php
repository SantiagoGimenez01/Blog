<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>
        
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

        <!-- CAJA PRINCIPAL -->
        <div id="main-box">
            <h1>Todas las entradas</h1>
            <?php 
                $entradas = GetAllEntradas($db);
                if(!empty($entradas)):
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
                endif;
            ?>
        </div>   
        <!-- FOOTER -->
         <?php require_once 'includes/footer.php';?>

