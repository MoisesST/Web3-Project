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
      $this->setErroMensagem('description', 'Must be at least 4 characters long.');
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

  public static function fetchAll()
  {
    // $sql = self::SEARCH_ALL . ' ORDER BY r.id';
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

  public static function fetchRecords($filter = [])
  {
    $sqlWhere = '';
    $parameters = [];
    if (array_key_exists('city', $filter) && $filter['city'] != '') {
      $parameters[] = $filter['city'];
      $sqlWhere .= ' AND c.id = ?';
    }
    $sql = self::SEARCH_ALL .
      ' WHERE TRUE' . $sqlWhere . ' ORDER BY r_name, r.classification';
    $command = DW3BancoDeDados::prepare($sql);
    foreach ($parameters as $i => $parameter) {
      $command->bindValue($i+1, $parameter, PDO::PARAM_STR);
    }
    $command->execute();
    $registers = $command->fetchAll();
    // var_dump($registers);
    // print_r($registers);
    // exit;
    $rolles = [];
    if ($registers) {
      for ($i = 0; $i < count($registers); $i++) {
        // $rolles[$i] = [
        //   'r_id' => $registers[$i][0],
        //   'r_name' => $registers[$i][3],
        //   'description' => $registers[$i][4],
        //   'horary' => $registers[$i][5],
        //   'classification' => $registers[$i][6],
        //   'c_name' => $registers[$i][8]
        // ];

        // var_dump('[0] ' . $registers[0][0]);
        // var_dump('[1] ' . $registers[0][1]);
        // var_dump('[2] ' . $registers[0][2]);
        // var_dump('[3] ' . $registers[0][3]);
        // var_dump('[4] ' . $registers[0][4]);
        // var_dump('[5] ' . $registers[0][5]);
        // var_dump('[6] ' . $registers[0][6]);
        // var_dump('[7] ' . $registers[0][7]);
        // var_dump('[8] ' . $registers[0][8]);
        // var_dump('[9] ' . $registers[0][9]);
        // var_dump('[10] ' . $registers[0][10]);
        // var_dump('[11] ' . $registers[0][11]);
        // var_dump('[12] ' . $registers[0][12]);
        // // var_dump($registers[0][13]);
        // exit;

        $rolleId = $registers[$i][0];
        $userId = $registers[$i][1];
        $rolleName = $registers[$i][3];
        $description = $registers[$i][4];
        $horary = $registers[$i][5];
        $classification = $registers[$i][6];
        $cityName = $registers[$i][8];

        $rolles[$i] = new Rolle(
          $userId,
          $rolleName,
          $description,
          $horary,
          $classification,
          null,
          $cityName,
          null,
          $rolleId
        );
      }
      // print_r($rolles);
      // exit;
      return $rolles;
    }
    return null;
    // return $registers;
  }
}