<?php
namespace Controlador;

class ReportControlador extends Controlador
{
  public function index()
  {
    $this->visao('report/index.php');
  }
}