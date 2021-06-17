<?php
    require_once('config.php');
    require_once(BASE_PATH.'../models/torres.php');
    require_once('torreCrud.php');

    $crud = new TorreCrud();
    $t = new Torre();

    if(isset($_POST['create'])){
        $t->setNombre($_POST['nombre']);
        $t->setNum_pisos($_POST['num_pisos']);
        $t->setAscensor($_POST['ascensor']);
        TorreCrud::crear($t);
        header('Location: ../views/html/gestor-torres.php');
    } elseif (isset($_POST['delete'])) {
        TorreCrud::eliminar($_POST['id']);
    }
?>