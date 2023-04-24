<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class SignUpControlador extends Controlador
{
  public function create()
  {
    $this->visao('user/signUp.php');
  }
}