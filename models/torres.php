	
	<?php

    class Apartamentos
    {

        protected $idTorre;
        protected $nombre;
        protected $num_pisos;
        protected $ascensor;

        public function setIdTorre($idTorre)
        {
            $this->idTorre = $idTorre;
            return $this;
        }

        public function getIdTorre()
        {
            return $this->idTorre;
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
        public function setNum_pisos($num_pisos)
        {
            $this->num_pisos = $num_pisos;
            return $this;
        }

        public function getNum_pisos()
        {
            return $this->num_pisos;
        }
        /////
        public function setAscensor($ascensor)
        {
            $this->ascensor = $ascensor;
            return $this;
        }

        public function getAscensor()
        {
            return $this->ascensor;
        }
        /////


    }
