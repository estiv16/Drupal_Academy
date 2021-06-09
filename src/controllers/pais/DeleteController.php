<?php

namespace PruebaPhp\controllers\pais;

use PruebaPhp\controllers\ControllerBase;
use PruebaPhp\model\mysql\StoragePais;

class DeleteController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    try {
      $id = $args['id'];
    $pais = NULL;
    if ($id) {
      $storage = new StoragePais($this->container->dbMysql);
      $pais = $storage->getById($id);
      $storage->delete($pais);
    }
  } catch (Exception $e) {
      echo 'No se realizo el proceso:',  $e->getMessage(), "\n";
  } 
  finally {
    return $response->withRedirect('/pais');
  }

    
  }

}