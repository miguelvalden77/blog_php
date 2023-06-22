<?php

require_once "includes/db.php";

$id = $_GET["id"];

$sql = "DELETE FROM entradas WHERE id = $id";
mysqli_query($db, $sql);

header("Location: index.php");

?>