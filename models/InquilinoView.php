<?php

class InquilinoView{

	protected $idInquilino;
	protected $nombre;
    protected $cedula;
    protected $fecha_mudanza;
    protected $propietario;
    protected $vehiculo;
    protected $num_apto;
    protected $torre;


  
    public function setIdInquilino($idInquilino){
        $this->idInquilino = $idInquilino;
        return $this;
    }
    public function getIdInquilino(){
        return $this->idInquilino;
    }   
/////
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function getNombre(){
        return $this->nombre;
    }
/////
    public function setCedula($cedula){
        $this->cedula = $cedula;
        return $this;
    }
    public function getCedula(){
        return $this->cedula;
    }
/////
    public function setFecha_mudanza($fecha_mudanza){
        $this->fecha_mudanza = $fecha_mudanza;
        return $this;
    }
    public function getFecha_mudanza(){
        return $this->fecha_mudanza;
    }
/////
    public function setPropietario($propietario){
        $this->propietario = $propietario;
        return $this;
    }
    public function getPropietario(){
        return $this->propietario;
    }
/////
    public function setVehiculo($vehiculo){
        $this->vehiculo = $vehiculo;
        return $this;
    }
    public function getVehiculo(){
        return $this->vehiculo;
    }
/////
    public function setNum_apto($num_apto){
        $this->num_apto = $num_apto;
        return $this;
    }
    public function getNum_apto(){
        return $this->num_apto;
    }

    public function setTorre($torre){
        $this->torre = $torre;
        return $this;
    }
    public function getTorre(){
        return $this->torre;
    }

       
}