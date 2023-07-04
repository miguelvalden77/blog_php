<?php if(isset($_SESSION["usuario"])): ?>

    <div class="usuario_section">
        <section class="mis_datos sidebar login">
            <h3><?= $_SESSION["usuario"]["nombre"] ?></h3>
            <div class="datos_section">
                <a class="datos_button bg-primary" href="mis_datos.php">Mis datos</a>
                <a class="datos_button bg-secondary" href="crear_entrada.php">Crear entradas</a>
                <a class="datos_button bg-alter" href="categorias.php">Categorias</a>
                <a class="datos_button bg-red" href="logout.php">Logout</a>
            </div>
        </section>

        <aside class="sidebar login">
            <h3>Buscar</h3>
            <form id="buscar_form" action="buscar.php" method="post">
                <input type="text" name="busqueda" id="busqueda">    
                <button class="main-button">Buscar</button>
            </form>
        </aside>
    </div>
<?php endif; ?>

<?php if(!isset($_SESSION["usuario"])): ?>
    <section class="auth_section">
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
                
                <button class="main-button">Entrar</button>
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
                
                <button class="main-button">Registrarse</button>
            </form>
            <?php borrarErrores() ?>
        </aside>
    </section>
    <?php endif; ?>

    <script>
        const form = document.getElementById("buscar_form")
        const input = document.getElementById("busqueda")
            
        form.addEventListener("submit", (evt)=>{
            console.log(input.value)
            if(input.value == "") evt.preventDefault()
        })
    </script>