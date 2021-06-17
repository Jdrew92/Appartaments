<?php
require_once('config.php');
require_once(BASE_PATH.'../models/apartamentos.php');
require_once('ApartamentoCrud.php');
$crud = new ApartamentoCrud();
$a = new Apartamento();

if(isset($_POST['create'])){
    $a->setTorres_idTorre($_POST['idTorre']);
    $a->setNum_apto($_POST['num_apto']);
    $a->setNum_piso($_POST['num_piso']);
    $a->setArea($_POST['area']);
    if('1' == $_POST['estado']){
        $a->setEstado(1);
    } else {
        $a->setEstado(0);
    }
    ApartamentoCrud::crear($a);
    header('Location: ../views/html/gestor-aptos.php');
} elseif (isset($_POST['delete'])) {
    ApartamentoCrud::eliminar($_POST['id']);
} elseif (isset($_POST['update'])) {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    if($estado == 1){
        $estado = 0;
    } else {
        $estado = 1;
    }
    ApartamentoCrud::editar($id, $estado);
    header('Location: ../views/html/gestor-aptos.php');
} elseif(isset($_POST['test'])){
    echo "Es un test";
}