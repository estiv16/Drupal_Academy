<?php

namespace PruebaPhp\controllers\usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;
use PruebaPhp\model\mysql\StoragePais;

class EditController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $usuario = NULL;
    $storagePais = new StoragePais($this->container->dbMysql);
    $paises = $storagePais->getAll();
    if ($id) {

      $storageUsuario = new StorageUsuario($this->container->dbMysql);
      $usuario = $storageUsuario->getById($id);
      }
    $response = $this->container->view->render($response, '/usuario/edit.phtml', ['usuario' => $usuario, 'paises'=>$paises]);
    return $response;
  }

}