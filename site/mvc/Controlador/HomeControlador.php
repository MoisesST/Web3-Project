<?php

namespace Controlador;

use \Framework\DW3Sessao;

class HomeControlador extends Controlador
{
  public function index()
  {
    // $this->verificarLogado();
    $this->visao('rolles/index.php', [
      'usuario' => $this->getUser(),
      'mensagem' => DW3Sessao::getFlash('mensagem', null)
    ]);
  }
}
