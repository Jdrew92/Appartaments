<?php
    require_once('db.php');
    require_once('config.php');
    require_once(BASE_PATH.'../models/torres.php');

    class TorreCrud{
        public function __construct(){}

        public static function crear($torre){
            $db = Db::conectar();
            $insert = $db->prepare('INSERT INTO torres VALUES (null, :nombre, :num_pisos, :ascensor)');
            $insert->bindValue('nombre', $torre->getNombre());
            $insert->bindValue('num_pisos',$torre->getNum_pisos());
            $insert->bindValue('ascensor', $torre->getAscensor());
            $insert->execute();
        }

        public static function listar(){
            $db = Db::conectar();
            $torres_list = [];
            $selectAll = $db->query("SELECT * FROM torres");

            foreach ($selectAll->fetchAll() as $torre) {
                $t = new Torre();
                $t->setIdTorre($torre['idTorre']);
                $t->setNombre($torre['nombre']);
                $t->setNum_pisos($torre['num_pisos']);
                $t->setAscensor($torre['ascensor']);
                $torres_list[] = $t;
            }
            return $torres_list;
        }

        public static function eliminar($id){
            $db = Db::conectar();
            $delete = $db->prepare('DELETE FROM torres WHERE idTorre = :id');
            $delete->bindValue('id', $id);
            $delete->execute();
        }

        public static function buscar($id){
            $db = Db::conectar();
            $select = $db->prepare('SELECT * FROM torres WHERE idTorre = :id');
            $select->bindValue('id', $id);
            $select->execute();
            $torre = $select->fetch();
            $t = new Torre();
            $t->setIdTorre($torre['idTorre']);
            $t->setNombre($torre['nombre']);
            $t->setNum_pisos($torre['num_pisos']);
            $t->setAscensor($torre['ascensor']);
            return $t;
        }

        /*public static function editar($id, $estado){
            $db = Db::conectar();
            $edit = $db->prepare('UPDATE torres SET estado=:estado WHERE idUsuario = :id');
            $edit->bindValue('id', $id);
            $edit->bindValue('estado', $estado);
            $edit->execute();
        }*/
    }
?>