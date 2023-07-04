<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>

<div class="container">
    <main class="contenido-principal">
        <h1 style="padding-bottom: 1rem;">Crear categoria</h1>
        <p style="padding-bottom: 1rem;">Crea una nueva categoria para que el resto de usuarios pueda verla</p>
        <form class="crear_categoria_form" action="guardar_categoria.php" method="post">
            <div>
                <h3 style="margin-right: 0.3rem; display: inline-block;">Nombre</h3>
                <input type="text" name="nombre">
            </div>
            
            <button class="bg-primary datos_form_button" style="margin-top: 0;">Crear</button>
        </form>
    </main>
    
    <?php require_once "includes/aside.php"; ?>
</div>

<?php require_once "includes/footer.php" ?>