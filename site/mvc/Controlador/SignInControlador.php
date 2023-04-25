<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class SignInControlador extends Controlador
{
  public function create()
  {
    $this->visao('sign-in/create.php');
  }

  public function storage()
  {
    $user = User::fetchEmail($_POST['email']);
      if ($user && $user->verifyPassword($_POST['password'])) {
        DW3Sessao::set('user', $user->getId());
        $this->redirecionar(URL_RAIZ . '');
      } else {
        $this->setErros(['sign-in' => 'Usuário ou senha inválido.']);
        $this->visao('sign-in/create.php');
      }
  }

  public function delete()
  {
    DW3Sessao::deletar('user');
    $this->redirecionar(URL_RAIZ . '');
  }
}
