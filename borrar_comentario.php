<?php

require_once "includes/db.php";

$id = $_GET["id"];

$sql = "DELETE FROM comentarios WHERE id = $id";
mysqli_query($db, $sql);

header("Location: index.php");
