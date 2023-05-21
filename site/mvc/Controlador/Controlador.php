<?php
namespace Controlador;

use \Framework\DW3Controlador;
use \Framework\DW3Sessao;
use \Modelo\User;

abstract class Controlador extends DW3Controlador
{
  use ControladorVisao;

  protected $user;

	protected function verificarLogado()
  {
    $user = $this->getUser();
    if ($user  == null ) {
      $this->redirecionar(URL_RAIZ . 'sign-in');
    }
  }

  protected function getUser()
  {
    if ($this->user == null) {
      $userId = DW3Sessao::get('user');
      if ($userId == null) {
        return null;
      }
      $this->user = User::fetchId($userId);
    }
    return $this->user;
  }

  public function isLoggedIn()
  {
    return $this->getUser();
  }
}
