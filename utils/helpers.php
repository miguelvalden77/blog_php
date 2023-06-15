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

    function getEntradas($db){
        $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoriaId = c.id ORDER BY e.id DESC;";
        $entradas = mysqli_query($db, $sql);
        $result = [];

        if($entradas && mysqli_num_rows($entradas) >= 1){
            $result = $entradas;
        }

        return $result;
    }

?>