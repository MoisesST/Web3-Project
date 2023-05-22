<?php
namespace Controlador;

use \Framework\DW3Sessao;
use Modelo\User;

class UserControlador extends Controlador
{
  public function create()
  {
    $this->setTitle('Sign Up');
    $this->visao('users/create.php');
  }

  public function storage()
  {
    $user = new User($_POST['email'], $_POST['password'], $_POST['name']);
    if ($user->isValido()) {
      $user->save();
      DW3Sessao::setFlash('message', 'Successfully registered user');
      $this->redirecionar(URL_RAIZ . 'users/create');
    } else {
      $this->setErros($user->getValidacaoErros());
      $this->visao('users/create.php');
    }
  }
}