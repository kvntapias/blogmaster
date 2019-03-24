<?php 
    //Iniciar la sesion y conexion a bd
    require_once "includes/conexion.php";
    //Recoger datos del form
    if (isset($_POST)) {
        if (isset($_SESSION['error_login'])) {
            session_unset($_SESSION['error_login']);
        }
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        
        $sql = "SELECT * from usuarios where email = '$email' LIMIT 1";
        $login = mysqli_query($db, $sql);
        if ($login && mysqli_num_rows($login)==1) {
            $usuario = mysqli_fetch_assoc($login);
           $veryfy = password_verify($password, $usuario['password']);
            if ($veryfy) {
                $_SESSION['usuario'] = $usuario;
                session_unset($_SESSION['error_login']);
            }else{
                $_SESSION['error_login'] = "Login incorrecto";
            }
        }else{
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }

    header('Location:index.php');
?>