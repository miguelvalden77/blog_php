<?php 

  require_once "includes/db.php";

  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_POST)){

    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($db, $_POST["apellidos"]) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, trim($_POST["email"])) : false;
    $contraseña = isset($_POST["contraseña"]) ? mysqli_real_escape_string($db, $_POST["contraseña"]) : false;

    $errores = [];

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        echo "El nombre es válido <br>";
        $nombre_validado = true;
    } else{
        $nombre_validado = false;
        $errores["nombre"] = "El campo nombre no es válido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
      echo "Los apellidos son válidos <br>";
      $nombre_validado = true;
    } else {
      $nombre_validado = false;
      $errores["apellidos"] = "El campo apellidos no es válido";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "El email es válido <br>";
      $email_validado = true;
    } else {
      $email_validado = false;
      $errores["email"] = "El email nombre no es válido";
    }
    
    if(!empty($contraseña)){
      echo "La contraseña no es válida <br>";
      $contraseña_validado = true;
    } else {
      $contraseña_validado = false;
      $errores["contraseña"] = "La contraseña no es válido";
    }

    $guardar_usuario = false;

    if(count($errores) == 0){
      $guardar_usuario = true;

      $password_segura = password_hash($contraseña, PASSWORD_BCRYPT, ["cost" => 4]);

      $sql = "INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES (NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
      $guardar = mysqli_query($db, $sql);

      if($guardar){
        $_SESSION["completado"] = "El registro se ha completado";
      }else{
        $_SESSION["errores"]["registro"] = "Error en el registro";
      }

    }else{
      $_SESSION["errores"] = $errores;
    }
    
  }
  
  header("Location: index.php");
?>