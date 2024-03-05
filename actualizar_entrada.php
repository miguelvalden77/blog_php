<?php

require_once "includes/db.php";

// if(!isset($_POST)){
//     header("Location: editar_entrada.php");
// }

$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : null;
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : null;
$categoriaId = isset($_POST["categoriaId"]) ? $_POST["categoriaId"] : null;
$usuarioId = $_SESSION["usuario"]["id"];
$id = $_GET["id"];

$sql = "UPDATE `entradas` SET  titulo = '$titulo', descripcion = '$descripcion', usuarioId = '$usuarioId', categoriaId = '$categoriaId' WHERE id = $id;";

$result = mysqli_query($db, $sql);

header("Location: index.php");
