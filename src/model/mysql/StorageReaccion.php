<?php

namespace PruebaPhp\model\mysql;

use PruebaPhp\model\StorageInterface;
use PruebaPhp\model\Model;
use PruebaPhp\model\Reaccion;
use PruebaPhp\util\db\QueryInterface;

class StorageReaccion implements StorageInterface {
    protected $query;

    protected $tableName = 'reaccion';

    public function __construct(QueryInterface $query) {
        $this->query = $query;
    }
    public function create(Model $reaccion) {
        $columns = ['idUsuario','idComentario','idTipoReaccion'];
        $values = [$reaccion->getIdUsuario(),$reaccion->getIdComentario(),$reaccion->getIdTipoReaccion()];
        $this->query->insert($this->tableName, $columns, $values);
    }
    public function update(Model $reaccion) {
        $updateValues = [
          ['column' => 'idUsuario', 'value' => $reaccion->getIdUsuario()],
          ['column' => 'idComentario', 'value' => $reaccion->getIdComentario()],
          ['column' => 'idTipoReaccion', 'value' => $reaccion->getIdTipoReaccion()],
        ];
        $conditions = [
          ['column' => 'id', 'value' => $reaccion->getId()],
        ];
        $this->query->update($this->tableName, $updateValues, $conditions);
    }
    public function delete(Model $reaccion) {
        $conditions = [
          ['column' => 'id', 'value' => $reaccion->getId()],
        ];
        $this->query->delete($this->tableName, $conditions);
    }
    public function getById(String $id) : Model {
        $conditions = [
          ['column' => 'id', 'value' => $id],
        ];
        $reaccion = $this->query->find($this->tableName, [], $conditions);
        if (!count($reaccion)) {
          return NULL;
        }
        $reaccionData = array_shift($reaccion);
        $reaccion = new TipoReaccion($reaccionData['idUsuario'],$reaccionData['idComentario'],$reaccionData['idTipoReaccion'],$reaccionData['id']);
        return $reaccion;
    }
    public function getAll() {
        $reaccionData = $this->query->find($this->tableName);
        $reaccion = [];
        foreach ($reaccionData as $reaccionData) {
          $reaccion[] = new Reaccion($reaccionData['idUsuario'],$reaccionData['idComentario'],$reaccionData['idTipoReaccion'],$reaccionData['id']);
        }
        return $reaccionData;
    }
}