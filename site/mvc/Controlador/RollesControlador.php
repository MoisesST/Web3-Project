<?php

namespace Controlador;

use Framework\DW3Sessao;
use Modelo\City;
use Modelo\Rolle;

class RollesControlador extends Controlador
{
  public function index()
  {
    $this->visao('rolles/index.php', [
      'title' => 'Rolle List',
      'cities' => City::fetchAll(),
      'rolles' => Rolle::fetchAll(),
      'message' => DW3Sessao::getFlash('message', null),
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
      // 'usuario' => $this->getUser(),
    ]);
  }

  public function create()
  {
    $this->verificarLogado();
    // $rolle = Rolle::fetchId(DW3Sessao::get('user'));
    $this->visao('rolles/create.php', [
      'title' => 'Register Rolle',
      'cities' => City::fetchAll(),
      // 'user' => $rolle->getUser(),
      // 'userId' => $rolle->getUserId(),
      'message' => DW3Sessao::getFlash('message', null),
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
      // 'sucesso' => DW3Sessao::getFlash('sucesso')
    ]);
  }

  public function storage()
  {
    $this->verificarLogado();
    $image = array_key_exists('image', $_FILES) ? $_FILES['image'] : null;
    $rolle = new Rolle(
      DW3Sessao::get('user'), // $this->getUser()->getId(),
      $_POST['name'],
      $_POST['description'],
      $_POST['horary'],
      $_POST['classification'],
      $image,
      $_POST['city'],
    );
    $rolle->save();
    DW3Sessao::setFlash('message', 'Successfully registered rolle');
    $this->redirecionar(URL_RAIZ . 'rolles/create');
  }

  public function delete($id)
  {
    $this->verificarLogado();
    $rolle = Rolle::fetchId($id);
    if ($rolle->getUserId() == $this->getUser()->getId()) {
      Rolle::delete($id);
      DW3Sessao::setFlash('message', 'Successfully deleted the rolle.');
    } else {
      DW3Sessao::setFlash('errorMessage', 'You cannot delete this rolle.');
    }
    $this->redirecionar(URL_RAIZ . 'rolles');
  }
}