<?php 

    require_once "includes/db.php";

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;

    if($nombre){
        $sql = "INSERT INTO `categorias` VALUES(NULL, '$nombre');";
        $create = mysqli_query($db, $sql);
    }

    header("Location: crear_categoria.php");

?>