<?php
    include('db.php');
    session_start();

    $user_check = $_SESSION['username'];
    $db = Db::conectar();
    $query = $db->prepare("SELECT username FROM usuarios WHERE username= :username");
    $query->bindValue("username", $user_check);
    $query->execute();
    $session = $query->fetch();
    if ($session == false){
        header("location: login-page.php");
        die();
    }
?>