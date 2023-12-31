<?php 
        require_once "includes/header.php"; 
        require_once "utils/helpers.php"; 
    ?>

    <div class="container">

        <main id="principal" class="contenido-principal">
            <h1 class="main-title">Entradas</h1>
            
            <?php 
                $entradas = getEntradas($db);
                if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)) :
            ?>

                <article>
                    <h2><?= $entrada["titulo"] ?></h2>
                    <span><?= $entrada["categoria"] ?></span>
                    <p><?= $entrada["descipcion"] ?></p>
                </article>

            <?php 
                endwhile;
                endif;
            ?>
            
            <article>
                <h2>Mi entrada</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus consectetur quam veniam quisquam, recusandae eligendi ab provident illo est sit cum temporibus mollitia labore, unde quis tempora quaerat eius rem!</p>
            </article>
            
            <article>
                <h2>Mi entrada</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus consectetur quam veniam quisquam, recusandae eligendi ab provident illo est sit cum temporibus mollitia labore, unde quis tempora quaerat eius rem!</p>
            </article>
        </main>

        <?php require_once "includes/aside.php"; ?>

    </div>

    <?php require_once "includes/footer.php"; ?>

</body>
</html>