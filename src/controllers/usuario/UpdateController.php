<?php

namespace PruebaPhp\controllers\usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;

class UpdateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $id = $args['id'];
    $body = $request->getParsedBody();
    if ($id) {
      $storage = new StorageUsuario($this->container->dbMysql);
      $usuario = $storage->getById($id);
      $usuario->setAll($body['nombre'],$body['telefono'],$body['direccion'],$body['password'],$body['date'],$body['idNacionalidad'],$body['email']);
      $storage->update($usuario);
    }
    return $response->withRedirect('/usuario');
  }

}