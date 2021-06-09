<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageTipoReaccion;

class EditController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $tipoReaccion = NULL;
    if ($id) {

      $storageTipoReaccion = new StorageTipoReaccion($this->container->dbMysql);
      $tipoReaccion = $storageTipoReaccion->getById($id);
    }
    $response = $this->container->view->render($response, '/tiporeaccion/edit.phtml', ['tipoReaccion' => $tipoReaccion]);
    return $response;
  }

}