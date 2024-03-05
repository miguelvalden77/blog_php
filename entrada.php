<?php
require_once "./utils/redirection.php";
require_once "./includes/header.php";
require_once "./utils/helpers.php";

$id = intval($_GET["id"]);
?>

<div class="container">

    <main id="principal" class="contenido-principal">
        <h1 class="main-title">Entrada</h1>

        <?php
        $entrada = getOneEntrada($db, $id);
        ?>

        <article>
            <h2><?= $entrada["titulo"] ?></h2>
            <p><?= $entrada["descripcion"] ?></p>
            <?php if ($_SESSION["usuario"]["id"] == $entrada["usuarioId"]) : ?>
                <section style="display: flex; gap: 1rem; padding-top: 1rem;">
                    <a href="borrar.php?id=<?= $entrada["id"] ?>">
                        <button style="border: none; color: whitesmoke;" class="datos_button bg-red">Eliminar</button>
                    </a>
                    <a href="editar_entrada.php?id=<?= $entrada["id"] ?>">
                        <button style="border: none; color: whitesmoke;" class="datos_button bg-alter">Editar</button>
                    </a>
                </section>
            <?php endif; ?>
            <?php require_once "includes/comments.php" ?>
        </article>
    </main>

    <?php require_once "includes/aside.php"; ?>

</div>

<?php require_once "includes/footer.php"; ?>

</body>

</html>