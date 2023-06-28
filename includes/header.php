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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header" style="border: none;">
        <div style="width: 100%;">
            <a style="display: block;" href="index.php">
                <h1 class="title-main" style="display: grid; place-items: center;">Blog de Videojuegos</h1>
            </a>
        </div>
        <nav class="nav-menu">
            <li class="inicio">
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
            <li class="inicio">
                <a href="">Sobre mí</a>
            </li>
            <li class="inicio">
                <a href="">Contacto</a>
            </li>
        </nav>
    </header>