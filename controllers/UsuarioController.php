<?php
    require_once('config.php');
    require_once(BASE_PATH.'../models/usuarios.php');
    require_once('usuarioCrud.php');

    $crud = new UsuarioCrud();
    $u = new Usuario();

    if(isset($_POST['create'])){
        $u->setUsername($_POST['username']);
        $u->setNombre($_POST['nombre']);
        $u->setApellido($_POST['apellido']);
        $u->setEmail($_POST['email']);
        $u->setPassword($_POST['password']);
        if('1' == $_POST['estado']){
            $u->setEstado(1);
        } else {
            $u->setEstado(0);
        }
        
        UsuarioCrud::crear($u);
        header('Location: ../views/html/gestor-usuarios.php');
    } elseif (isset($_POST['delete'])) {
        UsuarioCrud::eliminar($_POST['id']);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $estado = $_POST['estado'];
        if ($estado == 1){
            $estado = 0;
        } else{
            $estado = 1;
        }
        UsuarioCrud::editar($id, $estado);
        header('Location: ../views/html/index.php');
    } elseif(isset($_POST['test'])){
        echo "Es un test";
    }
?>