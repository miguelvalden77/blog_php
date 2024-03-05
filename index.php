<?php
require_once "includes/header.php";
require_once "utils/helpers.php";
?>

<div class="container">

    <main id="principal" class="contenido-principal">
        <h1 class="main-title">Últimas entradas</h1>

        <div class="article_container">
            <?php
            $entradas = getEntradas($db);
            if (!empty($entradas)) :
                while ($entrada = mysqli_fetch_assoc($entradas)) :
            ?>

                    <article>
                        <a href="entrada.php?id=<?= $entrada["id"] ?>">
                            <h2><?= $entrada["titulo"] ?></h2>
                        </a>
                        <p class="category_title"><?= $entrada["categoria"] ?></p>
                        <p class="descripcion_entrada"><?= $entrada["descripcion"] ?></p>
                    </article>

            <?php
                endwhile;
            endif;
            ?>
        </div>

        <button class="main-button">
            <a href="entradas.php">Ver todas</a>
        </button>
    </main>

    <?php require_once "includes/aside.php"; ?>

</div>

<?php require_once "includes/footer.php"; ?>

</body>

</html>