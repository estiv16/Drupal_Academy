<?php

namespace PruebaPhp\model;

class Publicacion implements Model{
    protected $id;
    protected $idUsuario;
    protected $date;
    protected $texto;

    public function __construct($idUsuario, $date, $texto, $id = NULL) {
        $this->idUsuario = $idUsuario;
        $this->date = $date;
        $this->texto = $texto;
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getDate(){
        return $this->date;
    }
    public function getTexto(){
        return $this->texto;
    }
    public function setAll($idUsuario, $date, $texto){
        $this->idUsuario = $idUsuario;
        $this->date = $date;
        $this->texto = $texto;

    }

}