<?php

require_once "includes/db.php";

if (!isset($_POST)) {
    header("Location: crear_entrada.php");
}

$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : null;
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : null;
$categoriaId = isset($_POST["categoriaId"]) ? $_POST["categoriaId"] : null;
$usuarioId = $_SESSION["usuario"]["id"];


$sql = "INSERT INTO `entradas` VALUES('$titulo', '$descripcion', '$categoriaId', '$usuarioId', NULL, NOW());";

mysqli_query($db, $sql);

header("Location: index.php");
