<?php
require_once('config.php');
require_once('');
require_once('ApartamentoCrud.php');

$crud = new ApartamentoCrud();
#$p = new Personaje();

if(isset($_POST['create'])){
    $p->setTipo($_POST['tipo']);
    $p->setNombre($_POST['nombre']);
    $p->setApellido($_POST['apellido']);
    $p->setAlias($_POST['alias']);
    $p->setTelefono($_POST['telefono']);
    $p->setEstado($_POST['estado']);
    ApartamentoCrud::crear($p);
    header('Location: ../Vistas/index.php');
} elseif (isset($_POST['delete'])) {
    ApartamentoCrud::eliminar($_POST['id']);
} elseif (isset($_POST['update'])) {
    $estado = $_POST['estado'];
    if($estado == 1){
        $estado = 0;
    } else {
        $estado = 1;
    }
    $id = $_POST['id'];
    ApartamentoCrud::editar($id, $estado);
    header('Location: ../Vistas/index.php');
} elseif(isset($_POST['test'])){
    echo "Es un test";
}