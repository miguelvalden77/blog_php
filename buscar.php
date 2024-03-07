<?php
require_once "includes/header.php";
require_once "utils/helpers.php";

if (!isset($_POST["busqueda"]) || empty($_POST["busqueda"])) {
    header("Location: index.php");
}

$nombre = $_POST["busqueda"];

?>

<div class="container">

    <main id="principal" class="contenido-principal">
        <h1 class="main-title">Busqueda: <?= $_POST["busqueda"] ?></h1>

        <?php
        $resultado = getEntradaByName($db, $nombre);
        $entradas = $resultado["result"];
        if (!empty($entradas)) :
            while ($entrada = mysqli_fetch_assoc($entradas)) :
        ?>

                <article>
                    <a href="entrada.php?id=<?= $entrada['id'] ?>">
                        <h2><?= $entrada["titulo"] ?></h2>
                    </a>
                    <p class="descripcion_entrada"><?= $entrada["descripcion"] ?></p>
                </article>

            <?php
            endwhile;
        elseif (empty($entradas)) :
            ?>

            <h2 style="color: blue;">No hay resultados</h2>

        <?php endif; ?>
    </main>

    <?php require_once "includes/aside.php"; ?>

</div>

<?php require_once "includes/footer.php"; ?>

</body>

</html>