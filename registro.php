<?php 
    if (isset($_POST['submit'])) {
        //traer conexion
        require_once 'includes/conexion.php';
        if (!isset($_SESSION)) {
            session_start();
        }
    
        $nombre  = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']): false ;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])): false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']):false;

        //array de errores
        $errores = array();

        //validar datos antes de guardarlos en la bd

        //validar nombre
        if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            echo "el nombre es valido";
            $nombre_validado = true;
        }else{
            $errores['nombre'] = "El nombre no es valido";
            $nombre_validado = false;
        }

        //validar apellidos
        if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
            echo "el apellidos es valido";
            $apellidos_validado = true;
        }else{
            $errores['apellidos'] = "El apellidos no es valido";
            $nombre_validado = false;
        }

        //validar email
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "el email es valido";
            $email_validado = true;
        }else{
            $errores['email'] = "El email no es valido";
            $email_validado = false;
        }

        //validar CONTRASEÑA
        if (!empty($password)) {
            echo "el password es valido";
            $password_validado = true;
        }else{
            $errores['password'] = "El password no es valido";
            $password_validado = false;
        }

        $guardar_usuario = fañse;
        if (count($errores) == 0) {

            //cifrar la contraseña
            $pass_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 4]);
            
            //insertamos user en la db
            $guardar_usuario = true;

            $sql = "INSERT INTO usuarios VALUES (NULL, '$nombre','$apellidos', '$email','$pass_segura', CURDATE())";
            $guardar = mysqli_query($db, $sql);

            if ($guardar) {
                $_SESSION['completado'] = "Registro exitoso";
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
            }
            
        }else{
            $guardar_usuario = false;
            $_SESSION['errores'] = $errores;
            header('Location:index.php');
        }
    }
    header('Location:index.php');
?>