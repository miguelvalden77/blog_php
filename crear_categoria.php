<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>
<?php require_once "includes/aside.php"; ?>

<div class="container">
    <main class="contenido-principal">
        <h1>Crear categoria</h1>
        <p>Crea una nueva categoria para que el resto de usuarios pueda verla</p>
        <form action="guardar_categoria.php" method="post">
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre">
            </div>
            
            <button>Crear</button>
        </form>
    </main>
    
</div>

<?php require_once "includes/footer.php" ?>