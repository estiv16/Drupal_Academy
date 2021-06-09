<?php

namespace PruebaPhp\controllers\Usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePais;


class CreateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $usuario = NULL;
    $storage = new StoragePais($this->container->dbMysql);
    $paises = $storage->getAll();
    
    $response = $this->container->view->render($response, '/usuario/edit.phtml', ['usuario' => $usuario, 'paises'=>$paises]);
    return $response;
  }

}