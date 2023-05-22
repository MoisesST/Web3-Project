<?php
namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\City;

class CitiesControlador extends Controlador
{
  public function create()
  {
    $this->verificarLogado();
    $this->setTitle('Register City');
    $this->visao('cities/create.php');
  }

  public function storage()
  {
    $this->verificarLogado();
    $city = new City($_POST['name']);
    if ($city->isValido()) {
      $city->save();
      DW3Sessao::setFlash('message', 'Successfully registered city');
      $this->redirecionar(URL_RAIZ . 'cities/create');
    } else {
      $this->setErros($city->getValidacaoErros());
      $this->visao('cities/create.php');
    }
  }
}