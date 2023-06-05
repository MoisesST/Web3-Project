<?php

namespace Controlador;

use Framework\DW3Sessao;
use Modelo\City;
use Modelo\Rolle;

class RollesControlador extends Controlador
{
  private function calculatePagination()
  {
    $page = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
    $city = array_key_exists('city', $_GET) ? intval($_GET['city']) : null;
    $limit = 4;
    $offset = ($page - 1) * $limit;
    $rolles = Rolle::fetchAll($limit, $offset, $city);
    $lastPage = ceil(Rolle::countAll($city) / $limit);
    return compact('page', 'rolles', 'lastPage');
  }

  public function index()
  {
    $this->setTitle('Rolle List');
    $pagination = $this->calculatePagination();
    $this->visao('rolles/index.php', [
      'rolles' => $pagination['rolles'],
      'page' => $pagination['page'],
      'lastPage' => $pagination['lastPage'],
      'cities' => City::fetchAll(),
    ]);
  }

  public function create()
  {
    $this->verificarLogado();
    $this->setTitle('Register Rolle');
    $this->visao('rolles/create.php', [
      'cities' => City::fetchAll(),
      'schedules' => ['0' => 'Night', '1' => 'Morning'],
      'message' => DW3Sessao::getFlash('message', null),
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
    ]);
  }

  public function storage()
  {
    $this->verificarLogado();
    $image = array_key_exists('image', $_FILES) ? $_FILES['image'] : null;
    $rolle = new Rolle(
      DW3Sessao::get('user'),
      $_POST['name'],
      $_POST['description'],
      $_POST['horary'],
      $_POST['classification'],
      $image,
      $_POST['city'],
    );
    if ($rolle->isValido()) {
      $rolle->save();
      DW3Sessao::setFlash('message', 'Successfully registered rolle');
      $this->redirecionar(URL_RAIZ . 'rolles/create');
    } else {
      $this->setErros($rolle->getValidacaoErros());
      $this->create();
    }
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