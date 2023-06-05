<?php
namespace Teste\Funcional;

use \Teste\Teste;

class TesteRoot extends Teste
{
  public function testeAcessar()
  {
    $resposta = $this->get(URL_RAIZ . 'rolles');
    $this->verificar(strpos($resposta['html'], 'Rolle List'));
    // $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
  }
}
