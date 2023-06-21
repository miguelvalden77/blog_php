<?php 

  require_once "includes/db.php";

  if(isset($_POST)){
      
      $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
      $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($db, $_POST["apellidos"]) : false;
      $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, trim($_POST["email"])) : false;
      
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
        
        $guardar_usuario = false;
        
        if(count($errores) == 0){
            $guardar_usuario = true;

            $act_sql = "SELECT email, id FROM `usuarios` WHERE email = '$email';";
            $verificar_email = mysqli_query($db, $act_sql);
            $user_info = mysqli_fetch_assoc($verificar_email);

            if($user_info["id"] == $_SESSION["usuario"]["id"] || empty($user_info)){

                $usuario = $_SESSION["usuario"];
                $sql = "UPDATE `usuarios` SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = ".$usuario["id"];
                $actualizar = mysqli_query($db, $sql);
            }
            else {
                $_SESSION["errores"]["general"] = "Email cogido";
                header("Location: index.php");
            }


      if($actualizar){
        $_SESSION["completado"] = "La actualización se ha completado";
        $_SESSION["usuario"]["nombre"] = $nombre;
        $_SESSION["usuario"]["apellidos"] = $apellidos;
        $_SESSION["usuario"]["email"] = $email;

      }else{
        $_SESSION["errores"]["registro"] = "Error en la actualización";
      }

    }else{
      $_SESSION["errores"] = $errores;
    }
    
  }
  
  header("Location: mis_datos.php");
?>