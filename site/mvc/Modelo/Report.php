<?php

namespace Modelo;

use \Framework\DW3BancoDeDados;

class Report extends Modelo
{
  const COUNT_CITIES = 'SELECT count(id) FROM cities';
  const COUNT_ROLLES = 'SELECT count(id) FROM rolles';
  const COUNT_HORARY_MORNING = 'SELECT count(id) FROM rolles WHERE horary = 0';
  const COUNT_HORARY_NIGHT = 'SELECT count(id) FROM rolles WHERE horary = 1';
  const COUNT_CLASSIFICATION_0 = 'SELECT count(id) FROM rolles WHERE classification = 0';
  const COUNT_CLASSIFICATION_1 = 'SELECT count(id) FROM rolles WHERE classification = 1';
  const COUNT_CLASSIFICATION_2 = 'SELECT count(id) FROM rolles WHERE classification = 2';
  const COUNT_CLASSIFICATION_3 = 'SELECT count(id) FROM rolles WHERE classification = 3';
  const COUNT_CLASSIFICATION_4 = 'SELECT count(id) FROM rolles WHERE classification = 4';
  const COUNT_CLASSIFICATION_5 = 'SELECT count(id) FROM rolles WHERE classification = 5';

  public static function total($query)
  {
    $registers = DW3BancoDeDados::query($query);
    $total = $registers->fetch();
    return intval($total[0]);
  }
}