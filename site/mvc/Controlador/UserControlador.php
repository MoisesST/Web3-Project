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
      'successMessage' => DW3Sessao::getFlash('successMessage', null)
    ]);
  }

  public function storage()
  {
    $user = new User($_POST['email'], $_POST['password'], $_POST['name']);
    $user->save();
    DW3Sessao::setFlash('successMessage', 'Successfully registered user');
    $this->redirecionar(URL_RAIZ . 'users/create');
  }
}