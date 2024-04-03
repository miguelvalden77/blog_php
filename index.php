<?php
require_once "includes/header.php";
require_once "utils/helpers.php";



$page = 1;

if (isset($_GET["page"])) {
    $page = intval($_GET["page"]);
}
?>

<div class="container">

    <main id="principal" class="contenido-principal">
        <h1 class="main-title">Últimas entradas</h1>

        <div class="article_section">
            <?php
            $resultado = getEntradas($db, $page);
            $entradas = $resultado["result"];
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

        <?php if (3 > 2) : ?>
            <section class="navigation_buttons">
                <?php
                if ($page != 1) :
                    echo "<a href='index.php?page=" . ($page - 1) . "'><button class='main-button'>" . ($page - 1) . "</button></a>";
                endif;
                ?>
                <button class="middle-button">
                    <?= $page ?>
                </button>
                <?php
                if (($entradas->num_rows + ($page - 1) * 4) < $resultado["total"]) :
                    echo "<a href='index.php?page=" . ($page + 1) . "'><button class='main-button'>" . ($page + 1) . "</button></a>";
                endif;
                ?>
            </section>
        <?php endif; ?>

    </main>

    <?php require_once "includes/aside.php"; ?>

</div>

<?php require_once "includes/footer.php"; ?>

</body>

</html>