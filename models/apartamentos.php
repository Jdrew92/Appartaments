<?php

class Apartamento{

	protected $area;
	protected $idApartamento;
    protected $estado;
    protected $num_apto;
    protected $num_piso;
    protected $Torres_idTorre;


  
    public function setArea($area){
        $this->area = $area;
        return $this;
    }

    public function getArea(){
        return $this->area;
    }
/////
    public function setIdApartamento($idApartamento){
        $this->idApartamento = $idApartamento;
        return $this;
    }

    public function getidApartamento(){
        return $this->idApartamento;
    }
/////
    public function setEstado($estado){
        $this->estado = $estado;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }
/////
    public function setNum_apto($num_apto){
        $this->num_apto = $num_apto;
        return $this;
    }

    public function getNum_apto(){
        return $this->num_apto;
    }
/////
    public function setNum_piso($num_piso){
        $this->num_piso = $num_piso;
        return $this;
    }

    public function getNum_piso(){
        return $this->num_piso;
    }
/////
    public function setTorres_idTorre($Torres_idTorre){
        $this->Torres_idTorre = $Torres_idTorre;
        return $this;
    }

    public function getTorres_idTorre(){
        return $this->Torres_idTorre;
    }
       
}