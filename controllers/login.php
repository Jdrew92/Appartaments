<?php
    include('db.php');
    session_start();

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $db = DB::conectar();
        $query = $db->prepare('SELECT idUsuario, estado FROM usuarios WHERE username = :username and password = :pwd');
        $query->bindValue("username", $username);
        $query->bindValue("pwd", $pwd);
        $query->execute();
        $login = $query->fetch();

        if ($login['estado'] == 0){
            header("location: ../views/html/login-page.php?adminE=".true);
        }
        else if($login != false){
            $_SESSION['username'] = $username;

            header("location: ../views/html/index.php");
        } else {
            header("location: ../views/html/login-page.php?error=".true);
        }
    }
?>