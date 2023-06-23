<?php if(isset($_SESSION["usuario"])): ?>

    <h3><?= $_SESSION["usuario"]["nombre"] ?></h3>
    <a href="mis_datos.php">Mis datos</a>
    <a href="crear_entrada.php">Crear entradas</a>
    <a href="crear_categoria.php">Crear categoria</a>
    <a href="logout.php">Logout</a>
<?php endif; ?>

<aside class="sidebar login">
        <h3>Buscar</h3>
            <form action="buscar.php" method="post">
                <input type="text" name="busqueda">    
                <button>Buscar</button>
            </form>
        </aside>

<?php if(!isset($_SESSION["usuario"])): ?>
    <aside class="sidebar login">
        <h3>Identifícate</h3>
        <?php if(isset($_SESSION["error_login"])): ?>
            <div class="error">
                <?= $_SESSION["error_login"] ?>
            </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="">Email</label>
                <input type="email" name="email">
                
                <label for="">Contraseña</label>
                <input type="password" name="contraseña">
                
                <button>Entrar</button>
            </form>
        </aside>
        
<aside class="sidebar register">
    <h3>Registrate</h3>
    
    <?php if(isset($_SESSION["completado"])): ?>
        <div class="exito">
            <?= $_SESSION["completado"] ?>
        </div>
        <?php elseif(isset($_SESSION["errores"]["registro"])): ?>
            <div class="error">
                <?= $_SESSION["errores"]["registro"] ?>
            </div>
            <?php endif; ?>
            
            <form action="./registro.php" method="post">
                
                <label for="">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                
                <label for="">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                
                <label for="">Email</label>
                <input type="email" name="email">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : ""; ?>
                
                <label for="">Contraseña</label>
                <input type="password" name="contraseña">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "contraseña") : ""; ?>
                
                <button>Registrarse</button>
            </form>
            <?php borrarErrores() ?>
        </aside>
        <?php endif; ?>