<?php
namespace Controlador;

trait ControladorVisao
{
  protected function getHighlightedErrorLabelCss($campoNome)
  {
    return $this->temErro($campoNome) ? 'text-red-200' : '';
    // label = text-red-200
  }

  protected function getHighlightedErrorInputCss($campoNome)
  {
    return $this->temErro($campoNome)
      ? 'bg-red-200 placeholder:text-red-800'
      : '';
    // imput = bg-red-200 placeholder:text-red-800
  }
}
