<?php require_once "db.php"; ?>
<?php require_once "utils/helpers.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de videojuegos</title>
    <link rel="stylesheet" href="assets/css/styles.css?v=<?php echo time(); ?>" type="text/css">
</head>
<body>
    
    <header class="header">
        <div>
            <a href="index.php">
                <h1>Blog de Videojuegos</h1>
            </a>
        </div>
        <nav class="nav-menu">
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <?php 
                $categorias = getCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)): 
            ?>
                <li>
                    <a href="categoria.php?id=<?= $categoria["id"]?>"><?= $categoria["nombre"] ?></a>
                </li>
            <?php 
                endwhile; 
                endif;
            ?>
            <li>
                <a href="">Sobre mí</a>
            </li>
            <li>
                <a href="">Contacto</a>
            </li>
        </nav>
    </header>