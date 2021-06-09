<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageTipoReaccion;
use PruebaPhp\model\TipoReaccion;

class InsertController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    try {
    $body = $request->getParsedBody();
    if ($body['tipoCara']) {
        $tipoReaccion = new TipoReaccion($body['tipoCara'], $body['imagen']);
        $storage = new StorageTipoReaccion($this->container->dbMysql);
        $storage->create($tipoReaccion);
    }
    } catch (Exception $e) {
        echo 'No se realizo el proceso:',  $e->getMessage(), "\n";
    } 
    finally {
      return $response->withRedirect('/tiporeaccion');
    }
  }

}
