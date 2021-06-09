<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageTiporeaccion;

class UpdateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $body = $request->getParsedBody();
    if ($id) {
      $storage = new StorageTipoReaccion($this->container->dbMysql);
      $tipoReaccion = $storage->getById($id);
      $tipoReaccion->setAll($body['tipoCara'],$body['imagen'],);
      $storage->update($tipoReaccion);
    }
    return $response->withRedirect('/tiporeaccion');
  }

}