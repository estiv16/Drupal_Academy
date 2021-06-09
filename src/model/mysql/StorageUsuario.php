<?php

namespace PruebaPhp\model\mysql;

use PruebaPhp\model\StorageInterface;
use PruebaPhp\model\Model;
use PruebaPhp\model\Usuario;
use PruebaPhp\util\db\QueryInterface;

class StorageUsuario implements StorageInterface {

  protected $query;


  protected $tableName = 'usuario';

  public function __construct(QueryInterface $query) {
    $this->query = $query;
  }

  public function create(Model $usuario) {
    $password = md5($usuario->getPassword());
    $columns = ['nombre','telefono','direccion','password','date','idNacionalidad','email'];
    $values = [$usuario->getNombre(), $usuario->getTelefono(), $usuario->getDireccion(), $password, $usuario->getDate(),$usuario->getIdNacionalidad(),$usuario->getEmail()];
    $this->query->insert($this->tableName, $columns, $values);
  }

  public function update(Model $usuario) {
    $password = md5($usuario->getPassword());
    $updateValues = [
      ['column' => 'nombre', 'value' => $usuario->getNombre()],
      ['column' => 'telefono', 'value' => $usuario->getTelefono()],
      ['column' => 'direccion', 'value' => $usuario->getDireccion()],
      ['column' => 'password', 'value' => $password],
      ['column' => 'date', 'value' => $usuario->getDate()],
      ['column' => 'idNacionalidad', 'value' => $usuario->getIdNacionalidad()],
      ['column' => 'email', 'value' => $usuario->getEmail()],
    ];
    $conditions = [
      ['column' => 'id', 'value' => $usuario->getId()],
    ];
    $this->query->update($this->tableName, $updateValues, $conditions);
  }

  public function delete(Model $usuario) {
    $conditions = [
      ['column' => 'id', 'value' => $usuario->getId()],
    ];
    $this->query->delete($this->tableName, $conditions);
  }

  public function getById(String $id) : Model {
    $conditions = [
      ['column' => 'id', 'value' => $id],
    ];
    $usuarios = $this->query->find($this->tableName, [], $conditions);
    if (!count($usuarios)) {
      return NULL;
    }
    $usuarioData = array_shift($usuarios);
    $usuario = new Usuario($usuarioData['nombre'],$usuarioData['telefono'],$usuarioData['direccion'],$usuarioData['password'],$usuarioData['date'],$usuarioData['idNacionalidad'],$usuarioData['email'], $usuarioData['id']);
    return $usuario;
  }

  public function getAll() {
    $usuariosData = $this->query->find($this->tableName);
    $usuarios = [];
    foreach ($usuariosData as $usuarioData) {
      $usuarios[] = new Usuario($usuarioData['nombre'],$usuarioData['telefono'],$usuarioData['direccion'],$usuarioData['password'],$usuarioData['date'],$usuarioData['idNacionalidad'],$usuarioData['email'], $usuarioData['id']);
    }
    return $usuarios;
  }

}