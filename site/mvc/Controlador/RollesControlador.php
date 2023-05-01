<?php
namespace Controlador;

use Framework\DW3Sessao;
use Modelo\City;

class RollesControlador extends Controlador
{
  // public function create()
  // {
  //   $cities = City::fetchAll();
  //   var_dump($cities);
  //   $this->visao('rolles/create.php', [
  //     'cities' => $cities
  //   ]);
  // }

  public function create()
  {
    $this->verificarLogado();
    $this->visao('rolles/create.php', [
      'cities' => City::fetchAll(),
      'sucesso' => DW3Sessao::getFlash('sucesso')
    ]);
  }

  public function armazenar()
  {
    $this->verificarLogado();
    $city = new City($_POST['name']);
    $city->save();
    $this->redirecionar(URL_RAIZ . 'cities');
  }
}