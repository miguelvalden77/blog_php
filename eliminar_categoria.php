<?php

    require_once "includes/db.php";


    if(!isset($_GET["id"])){
        header("Location: index.php");
    }

    $id = isset($_GET["id"]) ? $_GET["id"] : null;

    if($id){
        $sql = "DELETE FROM categorias WHERE id = '$id';";
        mysqli_query($db, $sql);
    }


    header("Location: categorias.php");

?>