<?php

namespace PruebaPhp\controllers\publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;


class CreateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $publicacion = NULL;
    $storage = new StorageUsuario($this->container->dbMysql);
    $usuarios = $storage->getAll();
    
    $response = $this->container->view->render($response, '/publicacion/edit.phtml', ['publicacion' => $publicacion, 'usuarios'=>$usuarios]);
    return $response;
  }

}