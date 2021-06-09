<?php

namespace PruebaPhp\model;

class TipoReaccion implements Model{

    
    protected $id;
    protected $tipoiCara;
    protected $imagen;

    public function __construct(String $tipoCara,String $imagen, String $id = NULL) {
        $this->tipoCara = $tipoCara;
        $this->imagen = $imagen;
        $this->id = $id;
      }

    public function getId(){
        return $this->id;
    }
    public function getTipoCara(){
        return $this->tipoCara;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function setAll($tipoCara,$imagen){
        $this->tipoCara = $tipoCara;
        $this->imagen = $imagen;
    }
}   