<?php require_once 'includes/helpers.php'; ?>
        <!-- BARRA LATERAL -->
    <aside id="sidebar">
        
            <?php if(isset($_SESSION['usuario'])): ?>
        
            <div id="login" class="block-aside">
                <h3>Buscar</h3>
            <?php if(isset($_SESSION['error_login'])): ?>
        
                <div class="alert alert-error">
                    <?= $_SESSION['error_login']; ?>
                </div>
        
            <?php endif; ?>
                <form action="buscar.php" method="POST">
                    <input type="text" name="busqueda"/>
                    <input type="submit" value="Buscar"/>
                </form>
            </div>
        
        <div id="login" class="block-aside">
            <center>
            <h3><?= '¡Bienvenido'.' '.$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'].'!'; ?></h3>
            </center>
            
            <!-- Botones -->
            <div>
                <a href="create-categoria.php" class="button">Crear categoria</a> 
                <a href="create-entrada.php" class="button">Crear entrada</a> 
                <a href="mis-datos.php" class="button">Mis datos</a> 
                <a href="leave.php" class="button">Cerrar sesion</a> 
            </div>
        </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['usuario'])): ?>
            <div id="login" class="block-aside">
                <h3>Logueate</h3>
            <?php if(isset($_SESSION['error_login'])): ?>
        
                <div class="alert alert-error">
                    <?= $_SESSION['error_login']; ?>
                </div>
        
            <?php endif; ?>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="text" name="email"/>
                    
                    <label for="password">Contraseña</label>
                    <input type="password" name="password"/>
                    
                    <input type="submit" name="logearse" value="Entrar"/>
                </form>
            </div>
            
            <div id="register" class="block-aside">
                
                <h3>Registrate</h3>
                <!-- Muestreo de errores -->
                <?php if(isset($_SESSION['completado'])): ?>
                <div class="alert alert-exito">
                    <?= $_SESSION['completado']; ?>
                </div>
                <?php elseif(isset($_SESSION['errores']['general'])) : ?>
                <div class="alert alert-error">
                    <?= $_SESSION['errores']['general']; ?>
                </div>
                <?php endif; ?>
                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Ej: Roberto"/>
                    <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'nombre'): ''; ?>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellidos" placeholder="Ej: Gomez"/>
                    <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'apellidos') : ''; ?>
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Ej: robertogomez@hotmail.com"/>
                    <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'email') : ''; ?>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password"  placeholder=" > 8 caracteres (Incluir numeros)"/>
                    <?php echo isset($_SESSION['errores']) ? ShowMistake($_SESSION['errores'], 'password') : ''; ?>
                    
                    <input type="submit" name="submit" value="Registrar"/>
                </form>
                <?php DeleteMistake(); ?>
            </div>
        <?php endif; ?> 
    </aside>
