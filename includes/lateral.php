
<!--BARRA LATERAL-->
<aside id="sidebar">
        <div id="buscador" class="bloque">
                    <h3>Buscar</h3>

                    <form action="buscar.php" METHOD="POST">
                            <input autocomplete="off" type="text" name="busqueda" id="buscar">
                            <input type="submit" value="Buscar">
                    </form>
            </div>

        <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logeado" class="bloque">
            <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].''.$_SESSION['usuario']['apellidos']; ?></h3>
            <a class="boton" href="cerrar.php">Cerrar sesión</a>
            <a class="boton" href="mis-datos.php">Mis datos</a>
            <a class="boton" href="crear-entradas.php">Crear entradas</a>
            <a class="boton" href="crear-categoria.php">Crear categoría</a>
        </div>
        <?php endif; ?>

        <?php if(!isset($_SESSION['usuario'])): ?>
                <div id="login" class="bloque">
                    <h3>Identificate</h3>

                <?php if(isset($_SESSION['error_login'])): ?>
                <div  class="alerta alerta-error">
                    <h3><?=$_SESSION['error_login']; ?></h3>
                </div>
                <?php endif; ?>

                    <form action="login.php" METHOD="POST">
                            <label for="email">Email:</label>
                            <input autocomplete="off" type="email" name="email" id="email">
                            <label for="password">Contraseña:</label>
                            <input autocomplete="off" type="password" name="password" id="password">
                            <input type="submit" value="Acceder">
                    </form>
                </div>

                <div id="register" class="bloque">
                    <?php if(isset($_SESSION['errores'])):
                    ?>

                    <?php endif ?>
                    <h3>Registrarse</h3>
                    <?php if(isset($_SESSION['completado'])):?>
                        <div class="alerta alerta-exito">
                            <?=$_SESSION['completado'];?>
                        </div>

                    <?php elseif(isset($_SESSION['errores']['general'])): ?>
                        <div class="alerta alerta-exito">
                            <?=$_SESSION['errores']['general'];?>
                        </div>
                    <?php endif; ?>
                    <form action="registro.php" method="POST">
                            <label for="nombre">Nombre:</label>
                            <input autocomplete="off" type="text" name="nombre" id="nombre">
                            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'nombre'): '' ?>
                            <label for="apellidos">Apellidos:</label>
                            <input autocomplete="off" type="text" name="apellidos" id="apellidos">
                            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'apellidos'): '' ?>
                            <label for="email">Email:</label>
                            <input autocomplete="off" type="email" name="email" id="email">
                            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'email'): '' ?>
                            <label for="password">Contraseña:</label>
                            <input autocomplete="off" type="password" name="password" id="password">
                            <?php echo isset($_SESSION['errores'])? mostrarError($_SESSION['errores'], 'password'): '' ?>
                            <input name="submit" type="submit" value="Registrarme">
                    </form>
                    <?php borrarError(); ?>
                </div>
            <?php endif; ?>
    </aside>