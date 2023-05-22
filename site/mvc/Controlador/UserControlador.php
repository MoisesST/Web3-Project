<?php
namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\User;

class UserControlador extends Controlador
{
  public function create()
  {
    $this->visao('users/create.php', [
      'title' => 'Sign Up',
      'message' => DW3Sessao::getFlash('message', null),
      // O errorMessage não é utilizado nessa tela, mas, foi colocado apenas para tirar o warning
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
    ]);
  }

  public function storage()
  {
    $user = new User($_POST['email'], $_POST['password'], $_POST['name']);
    $user->save();
    DW3Sessao::setFlash('message', 'Successfully registered user');
    $this->redirecionar(URL_RAIZ . 'users/create');
  }
}