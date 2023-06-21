<?php 
        require_once "includes/header.php"; 
        require_once "utils/helpers.php"; 

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
                    <p><?= $entrada["descipcion"] ?></p>
                </article>
        </main>

        <?php require_once "includes/aside.php"; ?>

    </div>

    <?php require_once "includes/footer.php"; ?>

</body>
</html>