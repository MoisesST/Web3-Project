<?php
namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\City;

class CitiesControlador extends Controlador
{
  public function create()
  {
    $this->verificarLogado();
    $this->visao('cities/create.php', [
      'mensagem' => DW3Sessao::getFlash('mensagem', null)
    ]);
  }

  public function storage()
  {
    $this->verificarLogado();
    $city = new City($_POST['name']);
    $city->save();
    $this->redirecionar(URL_RAIZ . 'cities/create');
  }
}