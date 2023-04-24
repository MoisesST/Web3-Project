<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class SignInControlador extends Controlador
{
  public function create()
  {
    $this->visao('user/signIn.php');
  }

    // public function armazenar()
    // {
    //     $usuario = Usuario::buscarNome($_POST['nome']);
    //     if ($usuario && $usuario->verificarSenha($_POST['senha'])) {
    //         DW3Sessao::set('usuario', $usuario->getId());
    //         if ($usuario->isAdmin()) {
    //             $this->redirecionar(URL_RAIZ . 'reclamacoes');
    //         } else {
    //             $this->redirecionar(URL_RAIZ . 'reclamacoes/criar');
    //         }
    //     } else {
    //         $this->visao('login/criar.php');
    //     }
    // }

    // public function destruir()
    // {
    //     DW3Sessao::deletar('usuario');
    //     $this->redirecionar(URL_RAIZ . 'login');
    // }
}
