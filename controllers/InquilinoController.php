<?php
    require_once('config.php');
    require_once(BASE_PATH.'../models/inquilinos.php');
    require_once('InquilinoCrud.php');

    $crud = new InquilinoCrud();
    $i = new Inquilino();

    if(isset($_POST['create'])){
        $i->setApartamentos_idApartamento($_POST['apto']);
        $i->setNombre($_POST['nombre']);
        $i->setApellido($_POST['apellido']);
        $i->setCedula($_POST['cedula']);
        $i->setFecha_mudanza($_POST['fecha_mudanza']);
        
        if('1' == $_POST['propietario']){
            $i->setPropietario(1);
        } else {
            $i->setPropietario(0);
        }

        if('1' == $_POST['vehiculo']){
            $i->setVehiculo(1);
        } else {
            $i->setVehiculo(0);
        }
        
        $crud::crear($i);
        header('Location: ../views/html/gestor-inquilinos.php');
    } elseif (isset($_POST['delete'])) {
        $crud::eliminar($_POST['id']);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $propietario = $_POST['propietario'];
        if ($propietario == 1){
            $propietario = 0;
        } else{
            $propietario = 1;
        }
        $vehiculo = $_POST['vehiculo'];
        if ($vehiculo == 1){
            $vehiculo = 0;
        } else{
            $vehiculo = 1;
        }
        $crud::editar($id, $propietario, $vehiculo);
        header('Location: ../views/html/gestor-inquilinos.php');
    } elseif(isset($_POST['test'])){
        echo "Es un test";
    }
?>
