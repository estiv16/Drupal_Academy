<?php

namespace PruebaPhp\model;

class Usuario implements Model{
    protected $id;
    protected $nombre;
    protected $telefono;
    protected $direccion;
    protected $password;
    protected $date;
    protected $idNacionalidad;
    protected $email;

    public function __construct( $nombre, $telefono, $direccion, $password, $date,$idNacionalidad, $email,  $id = NULL) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->password = $password;
        $this->date = $date;
        $this->idNacionalidad = $idNacionalidad;
        $this->email = $email;
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getDate(){
        return $this->date;
    }
    public function getIdNacionalidad(){
        return $this->idNacionalidad;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setAll($nombre,$telefono,$direccion,$password,$date,$idNacionalidad,$email){
       $this->nombre=$nombre;
       $this->telefono=$telefono;
       $this->direccion=$direccion;
       $this->password=$password;
       $this->date=$date;
       $this->idNacionalidad=$idNacionalidad;
       $this->email=$email;
    }
    
}