
<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>
        
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

<div id="main-box">
    <h1>Crear categoria</h1>
    <p>
        Agrega nuevas categorias para apoyar al blog y a la comunidad. Las categorias creadas van a poder ser usadas
        en las entradas que agreguen otros usuarios.
    </p>
    <form action="save-categoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"/>
        <input type="submit" value="Guardar"/>
    </form>

</div>

