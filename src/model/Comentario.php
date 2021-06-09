<?php

namespace PruebaPhp\model;

class Comentario implements Model{
    protected $id;
    protected $idUsuario;
    protected $idPublicacion;
    protected $texto;
    protected $date;

    public function __construct($idUsuario, $idPublicacion, $texto, $date,  $id = NULL) {
        $this->idUsuario = $idUsuario;
        $this->idPublicacion = $idPublicacion;
        $this->texto = $texto;
        $this->date = $date;
        $this->id = $id;
      }

    public function getId(){
        return $this->id;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getIdPublicacion(){
        return $this->idPublicacion;
    }
    public function getTexto(){
        return $this->texto;
    }
    public function getDate(){
        return $this->date;
    }
}