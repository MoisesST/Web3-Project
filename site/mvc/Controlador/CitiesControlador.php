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
      'title' => 'Register City',
      'message' => DW3Sessao::getFlash('message', null),
      // O errorMessage não é utilizado nessa tela, mas, foi colocado apenas para tirar o warning
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
    ]);
  }

  public function storage()
  {
    $this->verificarLogado();
    $city = new City($_POST['name']);
    $city->save();
    DW3Sessao::setFlash('message', 'Successfully registered city');
    $this->redirecionar(URL_RAIZ . 'cities/create');
  }
}