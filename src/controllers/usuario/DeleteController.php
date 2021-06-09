<?php

namespace PruebaPhp\controllers\usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;

class DeleteController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $usuario = NULL;
    if ($id) {
      $storage = new StorageUsuario($this->container->dbMysql);
      $usuario = $storage->getById($id);
      $storage->delete($usuario);
    }
    return $response->withRedirect('/usuario');
  }

}