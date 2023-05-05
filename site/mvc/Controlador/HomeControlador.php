<?php

namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\City;
use Modelo\Rolle;

class HomeControlador extends Controlador
{
  public function index()
  {
    $this->visao('rolles/index.php', [
      'cities' => City::fetchAll(),
      'rolles' => Rolle::fetchAll(),
      'mensagem' => DW3Sessao::getFlash('mensagem', null)
      // 'usuario' => $this->getUser(),
    ]);
  }
}
