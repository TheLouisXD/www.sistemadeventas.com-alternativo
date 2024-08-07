<?php
    include("../../config.php");
    
    session_start();
    if (isset($_SESSION['inicializar'])){
        $nombres = $_POST['Nombres'];
        $email = $_POST['email'];
        $password_user = $_POST['password_user'];
        $password_repeat = $_POST['password_repeat'];
        $rol = $_POST['rol'];

        // verificamos que ambas contraseñas sean iguales
    if ($password_user == $password_repeat) {

            // Usamos password hash para encriptar la contraseña
            $password_user = password_hash($password_user, PASSWORD_DEFAULT);

            // Creamos la sentencia SQL
            $sentencia = $pdo->prepare("INSERT INTO tb_usuarios (nombres, email, password_user, fyh_creacion, id_rol) VALUES (:nombres, :email, :password_user, :fyh_creacion, :id_rol)");

            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombres", $nombres);
            $sentencia->bindParam("email", $email);
            $sentencia->bindParam("password_user", $password_user);
            $sentencia->bindParam("fyh_creacion", $fechaHora);
            $sentencia->bindParam("id_rol", $rol);

            // Ejecutamos la sentencia
            $sentencia->execute();

            // iniciamos sesion con un mensaje de exito
            unset($_SESSION['inicializar']);
            $_SESSION["mensaje"] = "El usuario ".$nombres." fue registrado con exito";
            $_SESSION['icono'] = "success";
            header("Location:".$URL."");
        }

    } else {
        // Creamos una sesion con un mensaje de error.
        session_start();
        $_SESSION["mensaje"] = "Error, las contraseñas no son identicas";
        $_SESSION['icono'] = "error";
        header("Location:".$URL."/vistas/login/inicializar.php");
    }

?>