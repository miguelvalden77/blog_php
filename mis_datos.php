<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>

<div class="container">
    <main class="contenido-principal">
        <h1>Mis datos</h1>
        <form action="datos.php" method="post">
                    
                <label for="">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                
                <label for="">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                
                <button>Registrarse</button>

            </form>
    </main>
    <?php require_once "includes/aside.php"; ?>  
</div>

<?php require_once "includes/footer.php"; ?>