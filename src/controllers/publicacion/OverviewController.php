<?php

namespace PruebaPhp\controllers\publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePublicacion;

class OverviewController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $storage = new StoragePublicacion($this->container->dbMysql);
    $publicaciones = $storage->getAll();

    $response = $this->container->view->render($response, '/publicacion/overview.phtml', ['publicaciones' => $publicaciones]);
    return $response;
  }

}