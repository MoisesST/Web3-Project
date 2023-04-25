<?php
namespace Controlador;

use Modelo\City;

class RollesControlador extends Controlador
{
  public function create()
  {
    $cities = City::fetchAll();
    var_dump($cities);
    $this->visao('rolles/create.php', [
      'cities' => $cities
    ]);
  }

  public function armazenar()
  {
    $city = new City($_POST['name']);
    $city->save();
    $this->redirecionar(URL_RAIZ . 'cities');
  }
}