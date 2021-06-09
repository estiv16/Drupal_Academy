<?php

namespace PruebaPhp\controllers\usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;

class OverviewController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $storage = new StorageUsuario($this->container->dbMysql);
    $usuarios = $storage->getAll();

    $response = $this->container->view->render($response, '/usuario/overview.phtml', ['usuarios' => $usuarios]);
    return $response;
  }

}