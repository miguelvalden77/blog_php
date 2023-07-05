<?php 
    require_once "includes/header.php"; 
    require_once "utils/helpers.php";
        
    $cat = intval($_GET["id"]);    
?>

    <div class="container">

        <main id="principal" class="contenido-principal">
            <h1 class="main-title">Entradas</h1>
            
            <section class="article_section">
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
                elseif(empty($entradas)):
            ?>
            </section>
        
        <h2 style="color: blue;">No hay resultados</h2>
        
            <?php endif; ?>
        </main>

        <?php require_once "includes/aside.php"; ?>

    </div>

    <?php require_once "includes/footer.php"; ?>

</body>
</html>