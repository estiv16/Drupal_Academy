<?php

namespace PruebaPhp\controllers\Publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePublicacion;

class UpdateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $body = $request->getParsedBody();
    if ($id) {
      $storage = new StoragePublicacion($this->container->dbMysql);
      $publicacion = $storage->getById($id);
      $publicacion->setAll($body['idUsuario'],$body['date'],$body['texto']);
      $storage->update($publicacion);
    }
    return $response->withRedirect('/publicacion');
  }

}