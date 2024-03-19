<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>
        
        <!-- LATERAL -->
        <?php require_once 'includes/aside.php'; ?>

        <!-- CAJA PRINCIPAL -->
        <div id="main-box">
            <h1>Ultimas entradas</h1>
            <?php 
                $entradas = GetUltimasEntradas($db);
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
        
        <div id="all-inputs">
            <a href="entradas.php">Ver todas</a>
        </div>
         
        </div>   
        <!-- FOOTER -->
         <?php require_once 'includes/footer.php';?>
