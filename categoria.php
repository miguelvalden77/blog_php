<?php
require_once "includes/header.php";
require_once "utils/helpers.php";

$page = 1;
if (isset($_GET["page"])) {
    $page = intval($_GET["page"]);
}

$cat = intval($_GET["id"]);
?>

<div class="container">

    <main id="principal" class="contenido-principal">
        <h1 class="main-title"><?= $_GET["categoria"] ?></h1>

        <section class="article_section">
            <?php
            $resultado = getEntradas($db, $page, $cat);
            $entradas = $resultado["result"];
            if (!empty($entradas)) :
                while ($entrada = mysqli_fetch_assoc($entradas)) :
            ?>

                    <article style="padding-bottom: 0.75rem;">
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
        </section>

        <section class="navigation_buttons">
            <?php
            if ($page != 1) :
                echo "<button class='main-button'><a href='categoria.php?page=" . ($page - 1) . "&categoria=" . $_GET["categoria"] .  "&id=" . $cat . "'>" . ($page - 1) . "</a></button>";
            endif;
            ?>
            <button class="middle-button">
                <?= $page ?>
            </button>
            <?php
            if (($entradas->num_rows + ($page - 1) * 4) < $resultado["total"]) :
                echo "<button class='main-button'><a href='categoria.php?page=" . ($page + 1) . "&categoria=" . $_GET["categoria"] . "&id=" . $cat . "'>" . ($page + 1) . "</a></button>";
            endif;
            ?>
        </section>
    </main>

    <?php require_once "includes/aside.php"; ?>

</div>

<?php require_once "includes/footer.php"; ?>

</body>

</html>