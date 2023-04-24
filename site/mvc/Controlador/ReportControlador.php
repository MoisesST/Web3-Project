<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\User;

class ReportControlador extends Controlador
{
  public function show()
  {
    $this->visao('report/report.php');
  }
}