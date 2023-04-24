<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class City extends Modelo
{
  const SEARCH_ALL = 'SELECT * FROM cities ORDER BY name';
  const SEARCH_ID = 'SELECT * FROM cities WHERE id = ?';
  const INSERT = 'INSERT INTO cities(name) VALUES (?)';

  private $id;
  private $name;

  public function __construct($name, $id = null) {
    $this->id = $id;
    $this->name = $name;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function save()
  {
    $this->insert();
  }

  public function insert()
  {
    DW3BancoDeDados::getPdo()->beginTransaction();
    $command = DW3BancoDeDados::prepare(self::INSERT);
    $command->bindValue(1, $this->name, PDO::PARAM_STR);
    $command->execute();
    $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
    DW3BancoDeDados::getPdo()->commit();
  }

  public static function fetchAll()
  {
    $registers = DW3BancoDeDados::query(self::SEARCH_ALL);
    $cities = [];
    foreach ($registers as $register) {
      $cities[] = new City($register['id'], $register['name']);
    }
    return $cities;
  }

  public static function fetchId($id)
  {
    $command = DW3BancoDeDados::prepare(self::SEARCH_ID);
    $command->bindValue(1, $id, PDO::PARAM_INT);
    $command->execute();
    $register = $command->fetch();
    if ($register != false) {
      return new City($register['id'], $register['name']);
    }
    return null;
  }
}
