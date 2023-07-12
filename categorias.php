<?php 
    require_once "includes/header.php"; 
    require_once "utils/helpers.php";  
    require_once "utils/redirection.php";
?>

    <div class="container">

        <main id="principal" class="contenido-principal">
            <h1 class="main-title">Categorias</h1>

            <a class="datos_button bg-alter" href="crear_categoria.php" style="margin-bottom: 1rem;">Crear categorias</a>
            
            <?php 
                $categorias = getCategorias($db);
                if(!empty($categorias)):
                echo "<section class='categotias_section'>";
                while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>

                <article>
                    <a href="categoria.php?id=<?=$categoria['id']?>"><h2><?= $categoria["nombre"] ?></h2></a>
                    <a href="eliminar_categoria.php?id=<?=$categoria['id']?>">Borrar</a>
                </article>

            <?php 
                endwhile;
                echo "</section>";
                elseif(empty($categorias)):
            ?>
        
                <h2 style="color: blue;">No hay resultados</h2>
        
            <?php endif; ?>
        </main>

        <?php require_once "includes/aside.php"; ?>

    </div>

    <?php require_once "includes/footer.php"; ?>

</body>
</html>