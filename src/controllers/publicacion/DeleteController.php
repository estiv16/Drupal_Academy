<?php

namespace PruebaPhp\controllers\publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePublicacion;

class DeleteController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $publicacion = NULL;
    if ($id) {
      $storage = new StoragePublicacion($this->container->dbMysql);
      $publicacion = $storage->getById($id);
      $storage->delete($publicacion);
    }
    return $response->withRedirect('/publicacion');
  }

}