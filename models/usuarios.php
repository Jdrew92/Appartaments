	
	<?php

    class Usuario
    {

        protected $idUsuario;
        protected $username;
        protected $nombre;
        protected $apellido;
        protected $email;
        protected $estado;
        protected $password;

        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
            return $this;
        }

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }
        /////
        public function setUsername($username)
        {
            $this->username = $username;
            return $this;
        }

        public function getUsername()
        {
            return $this->username;
        }
        /////
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
            return $this;
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        /////
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
            return $this;
        }

        public function getApellido()
        {
            return $this->apellido;
        }
        /////
        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }

        public function getEmail()
        {
            return $this->email;
        }
        /////
        public function setEstado($estado)
        {
            $this->estado = $estado;
            return $this;
        }

        public function getEstado()
        {
            return $this->estado;
        }
        /////
        public function setPassword($password)
        {
            $this->password = $password;
            return $this;
        }

        public function getPassword()
        {
            return $this->password;
        }

        /////



    }
