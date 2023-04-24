<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class CitiesControlador extends Controlador
{
  public function create()
  {
    $this->visao('cities/create.php');
  }

  public function storage()
  {
    // $this->visao('cities/create.php');
  }
}