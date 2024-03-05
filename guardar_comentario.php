<?php

require_once "includes/db.php";

if (!isset($_POST)) {
    header("Location: crear_entrada.php");
}

$comentario = isset($_POST["comentario"]) ? $_POST["comentario"] : null;
$postId = isset($_POST["postId"]) ? $_POST["postId"] : null;
$usuarioId = $_SESSION["usuario"]["id"];

$sql = "INSERT INTO `comentarios` VALUES(NULL, '$postId', '$usuarioId', '$comentario');";

mysqli_query($db, $sql);

header("Location: index.php");
