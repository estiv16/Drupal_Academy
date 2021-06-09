<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageTipoReaccion;

class OverviewController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $storage = new StorageTipoReaccion($this->container->dbMysql);
    $tipoReacciones = $storage->getAll();

    $response = $this->container->view->render($response, '/tiporeaccion/overview.phtml', ['tipoReacciones' => $tipoReacciones]);
    return $response;
  }

}