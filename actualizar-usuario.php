<?php 
    if (isset($_POST['submit'])) {
        //traer conexion
        require_once 'includes/conexion.php';
    
        $nombre  = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']): false ;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])): false;

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

        $guardar_usuario = false;
        if (count($errores) == 0) {   
            $guardar_usuario = true;
            $usuario = $_SESSION['usuario'];
            $sql = "SELECT id, email FROM usuarios  where email = '$email'";
            $issetemail = mysqli_query($db, $sql);
            $issetuser = mysqli_fetch_assoc($issetemail);
            $iduser = $usuario['id'];    
            if ($issetuser['id'] == $iduser || empty($issetuser)) {
                //actualizar user en la db            
                $sql = "UPDATE usuarios SET nombre = '$nombre',
                apellidos = '$apellidos', email = '$email' where 
                id  = '$iduser' ";
                $guardar = mysqli_query($db, $sql);

                if ($guardar) {
                    $_SESSION['usuario']['nombre'] = $nombre;
                    $_SESSION['usuario']['apellidos'] = $apellidos;
                    $_SESSION['usuario']['email'] = $email;
                    $_SESSION['completado'] = "Actualizacion exitosa";
                }else{
                    $_SESSION['errores']['general'] = "Fallo al actualizar el usuario";
                }
            }else{
                $_SESSION['errores']['general'] = "El email ya existe";
            }            
        }else{
            $_SESSION['errores'] = $errores;
        }
    }
    header('Location:mis-datos.php');
?>