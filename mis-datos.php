<!-- CABECERA -->
<?php require_once 'includes/header.php'; ?>
        
<!-- LATERAL -->
<?php require_once 'includes/aside.php'; ?>

<div id="main-box">
        <h1>Mis datos</h1>
    <p>
        Actualiza y/o modifica tus datos personales tales como nombre, apellido o email en esta seccion.
    </p>
            <?php if(isset($_SESSION['completado'])): ?>
            <div class="alert alert-exito">
                <?= $_SESSION['completado']; ?>
            </div>
            <?php elseif(isset($_SESSION['errores']['general'])) : ?>
            <div class="alert alert-error">
                <?= $_SESSION['errores']['general']; ?>
            </div>
            <?php endif; ?>
            <form action="user-update" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>"/>
                <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'nombre'): ''; ?>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']; ?>"/>
                <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'apellidos') : ''; ?>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $_SESSION['usuario']['email']; ?>"/>
                <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'email') : ''; ?>
                <input type="submit" name="submit" value="Actualizar"/>
            </form>
            <?php DeleteMistake(); ?>
</div>