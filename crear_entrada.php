<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>
<?php require_once "includes/aside.php"; ?>

<div class="container">
    <main class="contenido-principal">
        <h1>Crear entrada</h1>
        <p>Crea una nueva entrada para que el resto de usuarios pueda verla</p>
        <form action="guardar_entrada.php" method="post">
            <div>
                <label>Titulo</label>
                <input type="text" name="titulo">

                <label>Descripcion</label>
                <textarea name="descripcion" cols="30" rows="10"></textarea>

                <label>Categoria</label>
                <select name="categoriaId">
                    <?php 
                    $categorias = getCategorias($db);
                    while($categoria = mysqli_fetch_assoc($categorias)): 
                    ?>
                        <option value="<?= $categoria["id"] ?>"><?= $categoria["nombre"] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <button>Crear</button>
        </form>
    </main>
    
</div>

<?php require_once "includes/footer.php" ?>