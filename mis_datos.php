<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>

<div class="container">
    <main class="contenido-principal">
        <h1>Mis datos</h1>
        <p><?= isset($_SESSION["errores"]["general"]) ? $_SESSION["errores"]["general"] : "" ?></p>
        <form action="actualizar.php" method="post">
                    
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?= $_SESSION["usuario"]["nombre"] ?>">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                
                <label for="">Apellidos</label>
                <input type="text" name="apellidos" value="<?= $_SESSION["usuario"]["apellidos"] ?>">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>

                <label for="">Email</label>
                <input type="text" name="email" value="<?= $_SESSION["usuario"]["email"] ?>">
                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                
                <button>Actualizar</button>

            </form>
    </main>
    <?php require_once "includes/aside.php"; ?>  
</div>

<?php require_once "includes/footer.php"; ?>