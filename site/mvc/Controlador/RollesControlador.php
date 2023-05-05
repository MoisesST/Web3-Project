<?php

namespace Controlador;

use Framework\DW3Sessao;
use Modelo\City;
use Modelo\Rolle;

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

  public function storage()
  {
    $this->verificarLogado();
    $image = array_key_exists('image', $_FILES) ? $_FILES['image'] : null;
    $rolle = new Rolle(
      DW3Sessao::get('user'),
      $_POST['city'],
      $_POST['name'],
      $_POST['description'],
      $_POST['horary'],
      $_POST['classification'],
      $image
    );
    $rolle->save();
    $this->redirecionar(URL_RAIZ . 'rolles/create');
  }
}