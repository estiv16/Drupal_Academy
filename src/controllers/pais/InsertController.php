<?php

namespace PruebaPhp\controllers\pais;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePais;
use PruebaPhp\model\Pais;

class InsertController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    
    $body = $request->getParsedBody();
    if ($body['name']) {
        $pais = new Pais($body['name']);
        $storage = new StoragePais($this->container->dbMysql);
        $storage->create($pais);
    }
    return $response->withRedirect('/pais');
  }

}