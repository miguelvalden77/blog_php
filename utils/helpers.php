<?php

function mostrarError($error, $campo)
{

    $alerta = "";

    if (isset($error[$campo]) && !empty($campo)) {
        $alerta = '<div style="color: red; margin-bottom: 0.5rem;">' . $error[$campo] . "</div>";
    }

    return $alerta;
}

function borrarErrores()
{

    $_SESSION["errores"] = null;
    $borrado = session_unset();

    return $borrado;
}

function getCategorias($db)
{

    $sql = "SELECT * FROM `categorias` ORDER BY id ASC;";
    $categorias = mysqli_query($db, $sql);
    $result = [];

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $result = $categorias;
    }

    return $result;
}

function getEntradas($db, $page = 1, $categoria = null)
{

    $limit = 4;
    $saltar = $page * 4 - 4;

    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoriaId = c.id ORDER BY e.fecha DESC LIMIT $limit OFFSET $saltar";

    if ($categoria != null) {
        $sql = "SELECT * FROM entradas WHERE categoriaId = '$categoria' ORDER BY fecha DESC LIMIT $limit OFFSET $saltar";
    }

    $entradas = mysqli_query($db, $sql);
    $result = [];
    $resultado = array("result" => $result, "total" => 0);

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;

        if ($categoria != null) {
            $num = mysqli_query($db, "SELECT COUNT(*) AS total FROM entradas WHERE categoriaId = $categoria");
        } else {
            $num = mysqli_query($db, "SELECT COUNT(*) AS total FROM entradas");
        }
        $totalNum = $num->fetch_assoc();
        $total = (int)$totalNum['total'];
        $resultado = array("result" => $result, "total" => $total);
    }

    return $resultado;
}

function getOneEntrada($db, $id)
{
    $sql = "SELECT e.*, CONCAT(u.nombre, u.apellidos) AS 'autor', u.id AS 'usuarioId' FROM entradas e INNER JOIN usuarios u ON e.usuarioId = u.id WHERE e.id = '$id';";

    $entrada = mysqli_query($db, $sql);

    $result = [];
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $result = mysqli_fetch_assoc($entrada);
    }

    return $result;
}

function getEntradaByName($db, $name)
{
    $sql = "SELECT * FROM entradas WHERE titulo LIKE '%$name%' OR descripcion LIKE '%$name%';";
    $entradas = mysqli_query($db, $sql);

    $result = [];

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }

    return $result;
}

function getComments($db, $postId)
{
    $sql = "SELECT comentarios.*, usuarios.nombre AS nombre FROM comentarios INNER JOIN usuarios ON comentarios.usuarioId = usuarios.id WHERE postId = '$postId';";
    $comentarios = mysqli_query($db, $sql);

    $result = [];

    if ($comentarios && mysqli_num_rows($comentarios) >= 1) {
        $result = $comentarios;
    }

    return $result;
}

function getEntradaByUser($db, $usuarioId)
{
    $sql = "SELECT entradas.*, categorias.nombre AS categoria FROM entradas INNER JOIN categorias ON entradas.categoriaId = categorias.id WHERE usuarioId = '$usuarioId';";
    $entradas = mysqli_query($db, $sql);

    $result = [];

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $result = $entradas;
    }

    return $result;
}
