<?php
require_once "utils/redirection.php";
require_once "includes/header.php";
require_once "utils/helpers.php";
?>

<div class="container">
    <main class="contenido-principal">
        <h1 class="datos_title">Mis datos</h1>
        <p><?= isset($_SESSION["errores"]["general"]) ? $_SESSION["errores"]["general"] : "" ?></p>
        <form style="display: grid; place-items: center;" action="actualizar.php" method="post">

            <section class="datos_form">
                <div class="form-label">
                    <h3>Nombre</h3>
                    <input type="text" name="nombre" value="<?= $_SESSION["usuario"]["nombre"] ?>">
                    <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                </div>

                <div class="form-label">
                    <h3>Apellidos</h3>
                    <input type="text" name="apellidos" value="<?= $_SESSION["usuario"]["apellidos"] ?>">
                    <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                </div>

                <div class="form-label">
                    <h3>Email</h3>
                    <input type="text" name="email" value="<?= $_SESSION["usuario"]["email"] ?>">
                    <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                </div>
            </section>

            <button class="bg-primary datos_form_button">Actualizar</button>

        </form>

        <h1 class="main-title" style="margin-top: 1rem;">Mis entradas</h1>

        <div class="article_container">
            <?php
            $entradas = getEntradaByUser($db, $_SESSION["usuario"]["id"]);
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
    </main>
    <?php require_once "includes/aside.php"; ?>
</div>

<?php require_once "includes/footer.php"; ?>