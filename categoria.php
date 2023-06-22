<?php 
    require_once "includes/header.php"; 
    require_once "utils/helpers.php";
        
    $cat = intval($_GET["id"]);    
?>

    <div class="container">

        <main id="principal" class="contenido-principal">
            <h1 class="main-title">Entradas</h1>
            
            <?php 
                $entradas = getEntradas($db, null, $cat);
                if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)) :
            ?>

                <article>
                    <a href="entrada.php?id=<?=$entrada['id']?>"><h2><?= $entrada["titulo"] ?></h2></a>
                    <p><?= $entrada["descipcion"] ?></p>
                </article>

            <?php 
                endwhile;
                endif;
            ?>
        </main>

        <?php require_once "includes/aside.php"; ?>

    </div>

    <?php require_once "includes/footer.php"; ?>

</body>
</html>