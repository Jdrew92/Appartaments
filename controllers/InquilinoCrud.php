<?php
    require_once('db.php');
    require_once('config.php');
    require_once(BASE_PATH.'../models/inquilinos.php');
    require_once(BASE_PATH.'../models/inquilinoView.php');
    require_once(BASE_PATH.'../controllers/ApartamentoCrud.php');

    class InquilinoCrud{
        public function __construct(){}

        public static function crear($inquilino){
            $db = Db::conectar();
            $insert = $db->prepare('INSERT INTO inquilinos VALUES (null, :nombre, :apellido, :cedula, :fecha_mudanza, :propietario, :vehiculo, :idApartamento)');
            $insert->bindValue('nombre', $inquilino->getNombre());
            $insert->bindValue('apellido', $inquilino->getApellido());
            $insert->bindValue('cedula', $inquilino->getCedula());
            $insert->bindValue('fecha_mudanza', $inquilino->getFecha_mudanza());
            $insert->bindValue('propietario', $inquilino->getPropietario());
            $insert->bindValue('vehiculo', $inquilino->getVehiculo());
            $insert->bindValue('idApartamento', $inquilino->getApartamentos_idApartamento());
            $insert->execute();
            ApartamentoCrud::editar($inquilino->getApartamentos_idApartamento(), 0);
        }

        public static function listar(){
            $db = Db::conectar();
            $inquilinos_list = [];
            $selectAll = $db->query("SELECT * FROM inquilinos");
            foreach ($selectAll->fetchAll() as $inquilino) {
                $i = new Inquilino();
                $i->setIdInquilino($inquilino['idInquilino']);
                $i->setNombre($inquilino['nombre']);
                $i->setApellido($inquilino['apellido']);
                $i->setApartamentos_idApartamento($inquilino['Apartamentos_idApartamento']);
                $i->setCedula($inquilino['cedula']);
                $i->setPropietario($inquilino['propietario']);
                $i->setVehiculo($inquilino['vehiculo']);
                $i->setFecha_mudanza($inquilino['fecha_mudanza']);
                $inquilinos_list[] = $i;
            }
            return $inquilinos_list;
        }

        public static function listarView(){
            $db = Db::conectar();
            $inquilinos_list = [];
            $selectAll = $db->query("select i.idInquilino, i.nombre , i.apellido , i.cedula , t.nombre as 'torre' , a.num_apto ,i.fecha_mudanza , i.propietario , i.vehiculo from ((inquilinos i inner join apartamentos a on i.Apartamentos_idApartamento = a.idApartamento) inner join torres t on a.Torres_idTorre = t.idTorre)");
            foreach ($selectAll->fetchAll() as $inquilino) {
                $i = new InquilinoView();
                $i->setIdInquilino($inquilino['idInquilino']);
                $i->setNum_apto($inquilino['num_apto']);
                $i->setNombre($inquilino['nombre']);
                $i->setApellido($inquilino['apellido']);
                $i->setCedula($inquilino['cedula']);
                $i->setFecha_mudanza($inquilino['fecha_mudanza']);
                $i->setPropietario($inquilino['propietario']);
                $i->setVehiculo($inquilino['vehiculo']);
                $i->setTorre($inquilino['torre']);
                $inquilinos_list[] = $i;
            }
            return $inquilinos_list;
        }

        public static function eliminar($id){
            $db = Db::conectar();
            $delete = $db->prepare('DELETE FROM inquilinos WHERE idInquilino = :id');
            $delete->bindValue('id', $id);
            $delete->execute();
        }

        public static function buscar($id){
            $db = Db::conectar();
            $select = $db->prepare("select i.idInquilino as 'idInquilino', i.cedula as 'cedula', i.nombre as 'nombre', i.apellido as 'apellido' , t.nombre as 'torre' , a.num_apto as 'num_apto',i.fecha_mudanza as 'fecha_mudanza', i.propietario as 'propietario', i.vehiculo as 'vehiculo' from ((inquilinos i inner join apartamentos a on i.Apartamentos_idApartamento = a.idApartamento) inner join torres t on a.Torres_idTorre = t.idTorre) WHERE idInquilino = :id");
            $select->bindValue('id', $id);
            $select->execute();
            $inquilino = $select->fetch();
            $i = new InquilinoView();
            $i->setIdInquilino($inquilino['idInquilino']);
            $i->setNum_apto($inquilino['num_apto']);
            $i->setCedula($inquilino['cedula']);
            $i->setNombre($inquilino['nombre']);
            $i->setApellido($inquilino['apellido']);
            $i->setFecha_mudanza($inquilino['fecha_mudanza']);
            $i->setPropietario($inquilino['propietario']);
            $i->setVehiculo($inquilino['vehiculo']);
            $i->setTorre($inquilino['torre']);
            return $i;
        }

        public static function editar($id, $propietario, $vehiculo){
            $db = Db::conectar();
            $edit = $db->prepare('UPDATE inquilinos SET propietario=:propietario, vehiculo=:vehiculo WHERE idInquilino = :id');
            $edit->bindValue('id',$id);
            $edit->bindValue('propietario', $propietario);
            $edit->bindValue('vehiculo', $vehiculo);
            $edit->execute();
        }
    }
?>