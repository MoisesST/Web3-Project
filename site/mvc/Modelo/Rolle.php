<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Rolle extends Modelo
{
  const SEARCH_ID = 'SELECT * FROM rolles WHERE id = ? LIMIT 1';

  const DELETE = 'DELETE FROM rolles WHERE id = ?';

  const COUNT_ALL = 'SELECT count(id) FROM rolles';

  const SEARCH_ALL = 'SELECT
    r.id r_id, r.user_id, r.city_id, r.name r_name, r.description, r.horary,
    r.classification,
    c.id c_id, c.name c_name,
    u.id u_id, u.name u_name, u.email, u.password
  FROM rolles r
    JOIN cities c ON (r.city_id = c.id)
    JOIN users u ON (r.user_id = u.id)';

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
    $this->classification = (int) $classification;
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

  public function verificarErros()
  {
    if (strlen($this->name) < 3) {
      $this->setErroMensagem('name', 'Must be at least 3 characters long.');
    }
    if (strlen($this->description) < 4) {
      $this->setErroMensagem(
        'description', 'Must be at least 4 characters long.'
      );
    }
    if ($this->cityId == null) {
      $this->setErroMensagem('city', 'Select a city.');
    } elseif (City::fetchId($this->cityId) == null) {
      $this->setErroMensagem('city', 'Invalid city.');
    }
    if ($this->horary != '0' && $this->horary != '1') {
      $this->setErroMensagem('horary', 'Invalid horary.');
    } elseif ($this->horary == null) {
      $this->setErroMensagem('horary', 'Select a horary.');
    }
    if ($this->classification === null) {
      $this->setErroMensagem('classification', 'Select a classification.');
    } elseif ($this->classification < 0 || $this->classification > 5) {
      $this->setErroMensagem('classification', 'Invalid classification.');
    }
    if (DW3ImagemUpload::existeUpload($this->image)
      && !DW3ImagemUpload::isValida($this->image)) {
      $this->setErroMensagem('image', 'It must be a maximum of 500 KB.');
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

  public static function fetchAll($limit, $offset, $city)
  {
    $sql = self::SEARCH_ALL;
    if ($city) {
      $sql .= ' WHERE c.id = :city';
    }
    $sql .= ' ORDER BY classification DESC, r.name LIMIT :limit OFFSET :offset';
    $command = DW3BancoDeDados::prepare($sql);
    if ($city) {
      $command->bindValue(':city', $city, PDO::PARAM_INT);
    }
    $command->bindValue(':limit', $limit, PDO::PARAM_INT);
    $command->bindValue(':offset', $offset, PDO::PARAM_INT);
    $command->execute();
    $registers = $command->fetchAll();
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

  public static function countAll($city)
  {
    if ($city) {
      $sql = 'SELECT count(*) FROM rolles WHERE city_id = :city';
      $command = DW3BancoDeDados::prepare($sql);
      $command->bindValue(':city', $city, PDO::PARAM_INT);
      $command->execute();
      $registers = $command->fetch();
      $total = $registers;
      return intval($total[0]);
    }
    $registers = DW3BancoDeDados::query(self::COUNT_ALL);
    $total = $registers->fetch();
    return intval($total[0]);
  }

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