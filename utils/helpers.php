<?php

    function mostrarError($error, $campo){

        $alerta = "";

        if(isset($error[$campo]) && !empty($campo)){
            $alerta = '<div style="color: red; margin-bottom: 0.5rem;">'.$error[$campo]."</div>";
        }

        return $alerta;
    }

    function borrarErrores(){

        $_SESSION["errores"] = null;
        $borrado = session_unset();

        return $borrado;
    }

    function getCategorias($db){

        $sql = "SELECT * FROM `categorias` ORDER BY id ASC;";
        $categorias = mysqli_query($db, $sql);
        $result = [];

        if($categorias && mysqli_num_rows($categorias) >= 1){
            $result = $categorias;
        }

        return $result;
    }

    function getEntradas($db, $limit = null, $categoria = null){
        $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoriaId = c.id ORDER BY e.id DESC";
        if($limit != null){
            $sql .= "LIMIT $limit";
        }

        if($categoria != null){
            $sql = "SELECT * FROM entradas WHERE categoriaId = '$categoria'";
        }

        $entradas = mysqli_query($db, $sql);
        $result = [];

        if($entradas && mysqli_num_rows($entradas) >= 1){
            $result = $entradas;
        }

        return $result;
    }

    function getOneEntrada($db, $id){
        $sql = "SELECT e.*, CONCAT(u.nombre, u.apellidos) AS 'autor', u.id AS 'usuarioId' FROM entradas e INNER JOIN usuarios u ON e.usuarioId = u.id WHERE e.id = '$id';";

        $entrada = mysqli_query($db, $sql);

        $result = [];
        if($entrada && mysqli_num_rows($entrada) >= 1){
            $result = mysqli_fetch_assoc($entrada);
        }

        return $result;
    }

    function getEntradaByName($db, $name){
        $sql = "SELECT * FROM entradas WHERE titulo LIKE '%$name%' OR descipcion LIKE '%$name%';";
        $entradas = mysqli_query($db, $sql);

        $result = [];

        if($entradas && mysqli_num_rows($entradas) >= 1){
            $result = $entradas;
        }

        return $result;
    }

    function getComments($db, $postId){
        $sql = "SELECT * FROM comentarios WHERE postId = '$postId';";
        $comentarios = mysqli_query($db, $sql);

        $result = [];

        if($comentarios && mysqli_num_rows($comentarios) >= 1){
            $result = $comentarios;
        }

        return $result;
    }

?>