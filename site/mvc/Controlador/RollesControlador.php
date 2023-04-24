<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class RollesControlador extends Controlador
{
  public function create()
  {
    $this->visao('rolles/create.php');
  }

  public function storage()
  {
    // $this->visao('cities/create.php');
  }
}