<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Rolle extends Modelo
{
  const SEARCH_ID = 'SELECT * FROM rolles WHERE id = ? LIMIT 1';

  const DELETE = 'DELETE FROM rolles WHERE id = ?';

  const SEARCH_ALL = 'SELECT
    r.id r_id, r.user_id, r.city_id, r.name r_name, r.description, r.horary,
    r.classification,
    c.id c_id, c.name c_name,
    u.id u_id, u.name u_name, u.email, u.password
  FROM rolles r
    JOIN cities c ON (r.city_id = c.id)
    JOIN users u ON (r.user_id = u.id)
  ORDER BY r.id';

  const INSERT = 'INSERT INTO rolles (
    user_id,
    city_id,
    name,
    description,
    horary,
    classification
  ) VALUES (?, ?, ?, ?, ?, ?)';

  private $id;
  private $userId;
  private $name;
  private $description;
  private $cityId;
  private $horary;
  private $classification;
  private $image;
  private $user;

  public function __construct(
    $userId,
    $name,
    $description,
    $horary,
    $classification,
    $image = null,
    $cityId = null,
    $user = null,
    $id = null
  ) {
    $this->id = $id;
    $this->userId = $userId;
    $this->name = $name;
    $this->description = $description;
    $this->cityId = $cityId;
    $this->horary = $horary;
    $this->classification = $classification;
    $this->image = $image;
    $this->user = $user;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getHorary()
  {
    return $this->horary === 1 ? 'Morning' : 'Night';
  }

  public function getClassification()
  {
    return $this->classification;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getCityId()
  {
    return $this->cityId;
  }

  public function getImage()
  {
    $imageName = "{$this->id}.png";
    if (!DW3ImagemUpload::existe($imageName)) {
      $imageName = 'padrao.jpg';
    }
    return $imageName;
  }

  private function salvarImagem()
  {
    if (DW3ImagemUpload::isValida($this->image)) {
      $nomeCompleto = PASTA_PUBLICO . "img/{$this->id}.png";
      DW3ImagemUpload::salvar($this->image, $nomeCompleto);
    }
  }

  public function save()
  {
    $this->insert();
    $this->salvarImagem();
  }

  public function insert()
  {
    DW3BancoDeDados::getPdo()->beginTransaction();
    $command = DW3BancoDeDados::prepare(self::INSERT);
    $command->bindValue(1, $this->userId, PDO::PARAM_STR);
    $command->bindValue(2, $this->cityId, PDO::PARAM_STR);
    $command->bindValue(3, $this->name, PDO::PARAM_STR);
    $command->bindValue(4, $this->description, PDO::PARAM_STR);
    $command->bindValue(5, $this->horary, PDO::PARAM_STR);
    $command->bindValue(6, $this->classification, PDO::PARAM_STR);
    $command->execute();
    $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
    DW3BancoDeDados::getPdo()->commit();
  }

  public static function fetchAll()
  {
    $registers = DW3BancoDeDados::query(self::SEARCH_ALL);
    $rolles = [];
    foreach ($registers as $register) {
      $user = new User(
        $register['email'],
        null,
        $register['u_name'],
        $register['u_id']
      );
      $city = new City(
        $register['c_name'],
        $register['c_id']
      );
      $rolles[] = new Rolle(
        $user,
        $register['r_name'],
        $register['description'],
        $register['horary'],
        $register['classification'],
        null,
        $city->getName(),
        null,
        $register['r_id'],
      );
    }
    return $rolles;
  }

  // public static function fetchId($id)
  // {
  //   $command = DW3BancoDeDados::prepare(self::SEARCH_ID);
  //   $command->bindValue(1, $id, PDO::PARAM_INT);
  //   $command->execute();
  //   $register = $command->fetch();
  //   return new Rolle(
  //     $register['user_id'],
  //     $register['name'],
  //     $register['description'],
  //     $register['horary'],
  //     $register['classification'],
  //     null,
  //     $register['city_id'],
  //     null,
  //     $register['id']
  //   );
  // }

  public static function fetchId($id)
  {
    $command = DW3BancoDeDados::prepare(self::SEARCH_ID);
    $command->bindValue(1, $id, PDO::PARAM_INT);
    $command->execute();
    $rolle = null;
    $register = $command->fetch();
    if ($register) {
      $rolle = new Rolle(
        $register['user_id'],
        $register['name'],
        $register['description'],
        $register['horary'],
        $register['classification'],
        null,
        $register['city_id'],
        null,
        $register['id']
      );
    }
    return $rolle;
  }

  public static function delete($id)
  {
    $command = DW3BancoDeDados::prepare(self::DELETE);
    $command->bindValue(1, $id, PDO::PARAM_INT);
    $command->execute();
  }
}