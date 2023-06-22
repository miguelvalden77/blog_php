<?php require_once "utils/redirection.php"; ?>
<?php require_once "includes/header.php";?>
<?php require_once "includes/aside.php"; ?>

<div class="container">
    <main class="contenido-principal">
        <h1>Editar entrada</h1>
        <p>Edita una entrada para que el resto de usuarios pueda verla</p>
        <?php 
            $id = $_GET["id"];
            $entrada = getOneEntrada($db, $id);
        ?>
        <form action="actualizar_entrada.php?id=<?= $entrada["id"] ?>" method="post">
            <div>
                <label>Titulo</label>
                <input value="<?= $entrada["titulo"] ?>" type="text" name="titulo">

                <label>Descripcion</label>
                <textarea name="descripcion" cols="30" rows="10">
                    <?= $entrada["descipcion"] ?>"
                </textarea>

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
            
            <button>Editar</button>
        </form>
    </main>
    
</div>

<?php require_once "includes/footer.php" ?>