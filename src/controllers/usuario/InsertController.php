<?php

namespace PruebaPhp\controllers\usuario;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StorageUsuario;
use PruebaPhp\model\Usuario;

class InsertController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    
    $body = $request->getParsedBody();
    if ($body['nombre']) {
        $usuario = new Usuario($body['nombre'],$body['telefono'],$body['direccion'],$body['password'],$body['date'],$body['idNacionalidad'],$body['email']);
        $storage = new StorageUsuario($this->container->dbMysql);
        $storage->create($usuario);
    }
    return $response->withRedirect('/usuario');
  }

}