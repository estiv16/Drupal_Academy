<?php

namespace PruebaPhp\controllers\pais;

use PruebaPhp\controllers\ControllerBase;


class CreateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $pais = NULL;
    
    $response = $this->container->view->render($response, '/pais/edit.phtml', ['pais' => $pais]);
    return $response;
  }

}