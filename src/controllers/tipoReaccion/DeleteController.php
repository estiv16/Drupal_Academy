<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageTipoReaccion;

class DeleteController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $tipoReaccion = NULL;
    if ($id) {
      $storage = new StorageTipoReaccion($this->container->dbMysql);
      $tipoReaccion = $storage->getById($id);
      $storage->delete($tipoReaccion);
    }
    return $response->withRedirect('/tiporeaccion');
  }

}