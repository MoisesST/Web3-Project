<?php
namespace Controlador;

use Modelo\Report;

class ReportControlador extends Controlador
{
  public function index()
  {
    $this->visao('report/index.php', [
      'totalCities' => Report::total(Report::COUNT_CITIES),
      'totalRolles' => Report::total(Report::COUNT_ROLLES),
      'totalHoraryMorning' => Report::total(Report::COUNT_HORARY_MORNING),
      'totalHoraryNight' => Report::total(Report::COUNT_HORARY_NIGHT),
      'totalHoraryClassification0' => Report::total(Report::COUNT_CLASSIFICATION_0),
      'totalHoraryClassification1' => Report::total(Report::COUNT_CLASSIFICATION_1),
      'totalHoraryClassification2' => Report::total(Report::COUNT_CLASSIFICATION_2),
      'totalHoraryClassification3' => Report::total(Report::COUNT_CLASSIFICATION_3),
      'totalHoraryClassification4' => Report::total(Report::COUNT_CLASSIFICATION_4),
      'totalHoraryClassification5' => Report::total(Report::COUNT_CLASSIFICATION_5),
    ]);
  }
}