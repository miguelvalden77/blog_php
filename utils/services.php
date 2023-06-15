<?php 

    function getCategorias($db){

        $sql = "SELECT nombre, id from `categorias`;";
        $response = mysqli_query($db, $sql);
        $categorias = mysqli_fetch_assoc($response);

        return $categorias;

    }

?>