<?php require_once "db.php"; ?>
<?php require_once "utils/helpers.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de videojuegos</title>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="./assets/css/styles.css" type="text/css">
</head>
<body style="background-image: url('assets/images/fondo.jpg'); background-position: center; background-size: cover; background-attachment: fixed; padding-bottom: 1rem;">
    <header class="header" style="border: none; backdrop-filter: blur(9px);">
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