<?php

namespace PruebaPhp\controllers\publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePublicacion;
use PruebaPhp\model\Publicacion;

class InsertController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    
    $body = $request->getParsedBody();
    if ($body['idUsuario']) {
        $publicacion = new Publicacion($body['idUsuario'],$body['date'],$body['texto']);
        $storage = new StoragePublicacion($this->container->dbMysql);
        $storage->create($publicacion);
    }
    return $response->withRedirect('/publicacion');
  }

}