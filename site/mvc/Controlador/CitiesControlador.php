<?php
namespace Controlador;

use Modelo\City;

class CitiesControlador extends Controlador
{
  public function create()
  {
    $this->visao('cities/create.php');
  }

  public function storage()
  {
    $city = new City($_POST['name']);
    $city->save();
    $this->redirecionar(URL_RAIZ . '');
  }
}