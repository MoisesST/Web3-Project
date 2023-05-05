<?php

namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\City;

class HomeControlador extends Controlador
{
  public function index()
  {
    $this->visao('rolles/index.php', [
      'cities' => City::fetchAll(),
      'mensagem' => DW3Sessao::getFlash('mensagem', null)
      // 'usuario' => $this->getUser(),
    ]);
  }
}
