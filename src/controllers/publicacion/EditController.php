<?php

namespace PruebaPhp\controllers\publicacion;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePublicacion;
use PruebaPhp\model\mysql\StorageUsuario;

class EditController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $publicacion = NULL;
    $storageUsuario = new StorageUsuario($this->container->dbMysql);
    $usuarios = $storageUsuario->getAll();
    if ($id) {

      $storagePublicacion = new StoragePublicacion($this->container->dbMysql);
      $publicacion = $storagePublicacion->getById($id);
    }
    $response = $this->container->view->render($response, '/publicacion/edit.phtml', ['publicacion' => $publicacion, 'usuarios'=>$usuarios]);
    return $response;
  }

}