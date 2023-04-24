<?php

namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\City;

class TesteCity extends Teste
{
  public function testeFetchAll()
  {
    (new City('Guarapuava'))->save();
    (new City('Cascavel'))->save();
    (new City('Maringá'))->save();
    (new City('Pato Grosso'))->save();
    $cities = City::fetchAll();
    $this->verificar(count($cities) == 4);
  }

  public function testeFetchId()
  {
    (new City('Guarapuava'))->save();
    $city = City::fetchId(1);
    $this->verificar($city->getName() == 'Guarapuava');
  }
}
