<?php

namespace PruebaPhp\model;

class Reaccion implements Model{
    protected $id;
    protected $idUsuario;
    protected $idPublicacion;
    protected $idTipoReaccion;

    public function __construct($idUsuario, $idComentario, $idTipoReaccion, $id = NULL) {
        $this->idUsuario = $idUsuario;
        $this->idComentario = $idComentario;
        $this->idTiporeaccion= $idTipoReaccion;
        $this->id = $id;
      }

    public function getId(){
        return $this->id;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getIdComentario(){
        return $this->idComentario;
    }
    public function getIdTipoReaccion(){
        return $this->idTiporeaccion;
    }

}