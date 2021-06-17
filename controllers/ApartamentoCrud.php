<?php
    require_once('db.php');
    include '..\models\apartamentos.php';

    class ApartamentoCrud{
        public function __construct(){}

        public static function crear($apartment){
            $db = Db::conectar();
            $insert = $db->prepare('INSERT INTO apartamentos VALUES (null, :Torres_idTorre, :num_apto, :num_piso, :area, :estado)');
            $insert->bindValue('Torres_idTorre', $apartment->getTorres_idTorre());
            $insert->bindValue('num_apto', $apartment->getNum_apto());
            $insert->bindValue('num_piso', $apartment->getNum_piso());
            $insert->bindValue('area', $apartment->getArea());
            $insert->bindValue('estado', $apartment->getEstado());
            $insert->execute();
        }

        public static function listar(){
            $db = Db::conectar();
            $apartments_list = [];
            $torres_list = [];
            $inquilinos_list = [];
            $selectAll = $db->query("SELECT a.idApartamento as 'id', t.idTorre as 'idTorre', t.nombre as 'torre', a.num_apto as 'num_apto', a.num_piso as 'num_piso' , a.area as 'area', a.estado as 'estado' from apartamentos a inner join torres t on a.Torres_idTorre  = t.idTorre");
            $selectTorres = $db->query("SELECT * FROM torres");
            $selectTenant = $db->query("SELECT * FROM inquilinos");
            foreach ($selectAll->fetchAll() as $apartment) {
                $a = new Apartamento();
                $t = new Torre();
                $a->setIdApartamento($apartment['id']);
                $a->setTorres_idTorre($apartment['idTorre']);
                $a->setNum_apto($apartment['num_apto']);
                $a->setNum_piso($apartment['num_piso']);
                $a->setArea($apartment['area']);
                $a->setEstado($apartment['estado']);
                $t->setIdTorre($apartment['idTorre']);
                $t->setNombre($apartment['torre']);
                $apartments_list[] = $a;
                $torres_list[] = $t;
            }
            return $apartments_list;
        }

        public static function eliminar($id){
            $db = Db::conectar();
            $delete = $db->prepare('DELETE FROM apartamentos WHERE idApartamento = :id');
            $delete->bindValue('id', $id);
            $delete->execute();
        }

        public static function buscar($id){
            $db = Db::conectar();
            $select = $db->prepare('SELECT * FROM apartamentos WHERE idApartamento = :id');
            $select->bindValue('id', $id);
            $select->execute();
            $apartment = $select->fetch();
            $a = new Apartamento();
            $a->setIdApartamento($apartment['idApartamento']);
            $a->setTorres_idTorre($apartment['Torres_idTorre']);
            $a->setNum_apto($apartment['num_apto']);
            $a->setNum_piso($apartment['num_piso']);
            $a->setArea($apartment['area']);
            $a->setEstado($apartment['estado']);
            return $a;
        }

        public static function editar($id, $estado){
            $db = Db::conectar();
            $edit = $db->prepare('UPDATE apartamentos SET estado=:estado WHERE idApartamentos = :id');
            $edit->bindValue('id',$id);
            $edit->bindValue('estado', $estado->getEstado());
            $edit->execute();
        }
    }
?>