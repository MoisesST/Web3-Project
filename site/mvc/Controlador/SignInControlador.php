<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class SignInControlador extends Controlador
{
  public function create()
  {
    $this->visao('sign-in/create.php', [
      'title' => 'Sign In',
      // as mensagens não são utilizadas nessa tela, mas, foram colocadas apenas para tirar os warnings
      'message' => DW3Sessao::getFlash('message', null),
      'errorMessage' => DW3Sessao::getFlash('errorMessage', null)
    ]);
  }

  public function storage()
  {
    $user = User::fetchEmail($_POST['email']);
    if ($user && $user->verifyPassword($_POST['password'])) {
      DW3Sessao::set('user', $user->getId());
      $this->redirecionar(URL_RAIZ . 'rolles');
    } else {
      $this->setErros(['sign-in' => 'Invalid username or password.']);
      $this->visao('sign-in/create.php');
    }
  }

  public function delete()
  {
    DW3Sessao::deletar('user');
    $this->redirecionar(URL_RAIZ . 'rolles');
  }
}
