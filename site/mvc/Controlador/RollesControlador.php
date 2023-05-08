<?php

namespace Controlador;

use Framework\DW3Sessao;
use Modelo\City;
use Modelo\Rolle;

class RollesControlador extends Controlador
{
  public function create()
  {
    $this->verificarLogado();
    // $rolle = Rolle::fetchId(DW3Sessao::get('user'));
    $this->visao('rolles/create.php', [
      'cities' => City::fetchAll(),
      // 'user' => $rolle->getUser(),
      // 'userId' => $rolle->getUserId(),
      'sucesso' => DW3Sessao::getFlash('sucesso')
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
    $rolle->save();
    $this->redirecionar(URL_RAIZ . 'rolles/create');
  }

  public function delete($id)
  {
    $this->verificarLogado();
    $rolle = Rolle::fetchId($id);
    // echo "\n\n\n" . $rolle->getUserId() . "\n\n\n";
    // echo "\n\n\n" . $this->getUser() . "\n\n\n";
    // exit;
    if ($rolle->getUserId() == $this->getUser()) {
      Rolle::delete($id);
      DW3Sessao::setFlash('mensagemFlash', 'Mensagem destruida.');
    } else {
      DW3Sessao::setFlash('mensagemFlash', 'Você não pode deletar as mensagens dos outros.');
    }
    $this->redirecionar(URL_RAIZ . '');
  }
}