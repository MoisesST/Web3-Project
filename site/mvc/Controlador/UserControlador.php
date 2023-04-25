<?php
namespace Controlador;

use Modelo\User;

class UserControlador extends Controlador
{
  public function create()
  {
    $this->visao('users/create.php');
  }

  public function storage()
  {
    $user = new User($_POST['email'], $_POST['password'], $_POST['name']);
    $user->save();
    $this->redirecionar(URL_RAIZ . '');
  }

  public function success()
  {
    $this->visao('users/success.php');
  }
}