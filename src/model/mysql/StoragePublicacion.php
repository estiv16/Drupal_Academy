<?php

namespace PruebaPhp\model\mysql;

use PruebaPhp\model\StorageInterface;
use PruebaPhp\model\Model;
use PruebaPhp\model\Publicacion;
use PruebaPhp\util\db\QueryInterface;

class StoragePublicacion implements StorageInterface {
    protected $query;

    protected $tableName = 'publicacion';
  
    public function __construct(QueryInterface $query) {
      $this->query = $query;
    }

  public function create(Model $publicacion) {
    $columns = ['idUsuario','date','texto'];
    $values = [$publicacion->getIdUsuario(),$publicacion->getDate(),$publicacion->getTexto()];
    $this->query->insert($this->tableName, $columns, $values);
  }

  public function update(Model $publicacion) {
    $updateValues = [
      ['column' => 'idUsuario', 'value' => $publicacion->getIdUsuario()],
      ['column' => 'date', 'value' => $publicacion->getDate()],
      ['column' => 'texto', 'value' => $publicacion->getTexto()],
    ];
    $conditions = [
      ['column' => 'id', 'value' => $publicacion->getId()],
    ];
    $this->query->update($this->tableName, $updateValues, $conditions);
  }

  public function delete(Model $publicacion) {
    $conditions = [
      ['column' => 'id', 'value' => $publicacion->getId()],
    ];
    $this->query->delete($this->tableName, $conditions);
  }

  public function getById(String $id) : Model {
    $conditions = [
      ['column' => 'id', 'value' => $id],
    ];
    $publicaciones = $this->query->find($this->tableName, [], $conditions);
    if (!count($publicaciones)) {
      return NULL;
    }
    $publicacionData = array_shift($publicaciones);
    $publicacion = new Publicacion($publicacionData['idUsuario'],$publicacionData['date'],$publicacionData['texto'],$publicacionData['id']);
    return $publicacion;
  }

  public function getAll() {
    $publicacionData = $this->query->find($this->tableName);
    $publicacion = [];
    foreach ($publicacionData as $publicacionData) {
      $publicacion[] = new Publicacion($publicacionData['idUsuario'],$publicacionData['date'],$publicacionData['texto'], $publicacionData['id']);
    }
    return $publicacion;
  }
}