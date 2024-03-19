
<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>
        
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

<div id="main-box">
    <h1>Crear entrada</h1>
    <p>
        Agrega nuevas entradas para informar a las personas de este blog sobre diferentes temas, si un tema todavia 
        no existe puedes añadirlo como categoria con el boton de arriba.
    </p>
    <form action="save-entrada.php" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? ShowMistake($_SESSION['errores_entrada'], 'titulo') : ''; ?> 
        <label for="descripcion">Descripcion</label>    
        <input type="text" name="descripcion"/>
        <?php echo isset($_SESSION['errores_entrada']) ? ShowMistake($_SESSION['errores_entrada'], 'descripcion') : ''; ?> 
        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php
                $categorias = GetCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?= $categoria['id']?>"><?= $categoria['nombre']?></option>
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? ShowMistake($_SESSION['errores_entrada'], 'categoria') : ''; ?> 
        <input type="submit" value="Crear"/>
    </form>
    <?php DeleteMistake(); ?>
</div>
<?php require_once './includes/footer.php'; ?>

