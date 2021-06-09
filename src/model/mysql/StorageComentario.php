<?php

namespace PruebaPhp\model\mysql;

use PruebaPhp\model\StorageInterface;
use PruebaPhp\model\Model;
use PruebaPhp\model\Comentario;
use PruebaPhp\util\db\QueryInterface;

class StorageComentario implements StorageInterface {

  protected $query;


  protected $tableName = 'comentario';

  public function __construct(QueryInterface $query) {
    $this->query = $query;
  }

  public function create(Model $comentario) {
    $columns = ['idUsuario','idPublicacion','texto','date'];
    $values = [$comentario->getIdUsuario(),$comentario->getIdPublicacion(),$comentario->getTexto(),$comentario->getDate()];
    $this->query->insert($this->tableName, $columns, $values);
  }

  public function update(Model $comentario) {
    $updateValues = [
      ['column' => 'idUsuario', 'value' => $comentario->getIdUsuario()],
      ['column' => 'idPublicacion', 'value' => $comentario->getIdPublicacion()],
      ['column' => 'texto', 'value' => $comentario->getTexto()],
      ['column' => 'date', 'value' => $comentario->getDate()],
    ];
    $conditions = [
      ['column' => 'id', 'value' => $pais->getId()],
    ];
    $this->query->update($this->tableName, $updateValues, $conditions);
  }

  public function delete(Model $comentario) {
    $conditions = [
      ['column' => 'id', 'value' => $comentario->getId()],
    ];
    $this->query->delete($this->tableName, $conditions);
  }

  public function getById(String $id) : Model {
    $conditions = [
      ['column' => 'id', 'value' => $id],
    ];
    $comentario = $this->query->find($this->tableName, [], $conditions);
    if (!count($comentario)) {
      return NULL;
    }
    $comentarioData = array_shift($comentario);
    $comentario = new Comentario($comentarioData['idUsuario'], $comentarioData['idPublicacion'],$comentarioData['texto'], $comentarioData['date'], $comentarioData['id']);
    return $comentarios;
  }

  public function getAll() {
    $comentarioData = $this->query->find($this->tableName);
    $comentario = [];
    foreach ($comentarioData as $comentarioData) {
        $comentario = new Comentario($comentarioData['idUsuario'], $comentarioData['idPublicacion'],$comentarioData['texto'], $comentarioData['date'], $comentarioData['id']);
    }
    return $comentario;
  }

}