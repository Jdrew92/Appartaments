<?php
    require_once('db.php');
    require_once('config.php');
    require_once(BASE_PATH.'../models/usuarios.php');

    class UsuarioCrud{
        public function __construct(){}

        public static function crear($user){
            $db = Db::conectar();
            $insert = $db->prepare('INSERT INTO usuarios VALUES (null, :username, :nombre, :apellido, :email, :estado, :pwd)');
            $insert->bindValue('username', $user->getUsername());
            $insert->bindValue('nombre', $user->getNombre());
            $insert->bindValue('apellido', $user->getApellido());
            $insert->bindValue('email', $user->getEmail());
            $insert->bindValue('estado', $user->getEstado());
            $insert->bindValue('pwd', $user->getPassword());
            $insert->execute();
        }

        public static function listar(){
            $db = Db::conectar();
            $users_list = [];
            $selectAll = $db->query("SELECT * FROM usuarios");

            foreach ($selectAll->fetchAll() as $user) {
                $u = new Usuario();
                $u->setIdUsuario($user['idUsuario']);
                $u->setUsername($user['username']);
                $u->setNombre($user['nombre']);
                $u->setApellido($user['apellido']);
                $u->setEmail($user['email']);
                $u->setPassword($user['password']);
                $u->setEstado($user['estado']);
                $users_list[] = $u;
            }
            return $users_list;
        }

        public static function eliminar($id){
            $db = Db::conectar();
            $delete = $db->prepare('DELETE FROM usuarios WHERE idUsuario = :id');
            $delete->bindValue('id', $id);
            $delete->execute();
        }

        public static function buscar($id){
            $db = Db::conectar();
            $select = $db->prepare('SELECT * FROM usuarios WHERE idUsuario = :id');
            $select->bindValue('id', $id);
            $select->execute();
            $user = $select->fetch();
            $u = new Usuario();
            $u->setIdUsuario($user['idUsuario']);
            $u->setUsername($user['username']);
            $u->setNombre($user['nombre']);
            $u->setApellido($user['apellido']);
            $u->setEmail($user['email']);
            $u->setPassword($user['password']);
            $u->setEstado($user['estado']);
            return $u;
        }

        public static function editar($id, $estado){
            $db = Db::conectar();
            $edit = $db->prepare('UPDATE usuarios SET estado=:estado WHERE idUsuario = :id');
            $edit->bindValue('id', $id);
            $edit->bindValue('estado', $estado);
            $edit->execute();
        }
    }
?>