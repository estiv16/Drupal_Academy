<?php

namespace PruebaPhp\controllers\tipoReaccion;

use PruebaPhp\controllers\ControllerBase;


class CreateController extends ControllerBase {

  public function __invoke($request, $response, $args) {
    $tipoReaccion = NULL;
    
    $response = $this->container->view->render($response, '/tiporeaccion/edit.phtml', ['tipoReaccion' => $tipoReaccion]);
    return $response;
  }

}