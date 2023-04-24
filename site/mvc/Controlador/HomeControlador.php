<?php

namespace Controlador;

class HomeControlador extends Controlador
{
  public function index()
  {
    $this->visao('rolles/list.php');
  }
}
