<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Rolle extends Modelo
{
  // const SEARCH_ID = 'SELECT * FROM users WHERE id = ? LIMIT 1';
  // const SEARCH_EMAIL = 'SELECT * FROM users WHERE email = ? LIMIT 1';
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
  private $cityId;
  private $name;
  private $description;
  private $horary;
  private $classification;
  private $user;
  private $image;

  public function __construct(
    $userId,
    $cityId,
    $name,
    $description,
    $horary,
    $classification,
    $image = null,
    $user = null,
    $id = null
  ) {
    $this->id = $id;
    $this->userId = $userId;
    $this->cityId = $cityId;
    $this->name = $name;
    $this->description = $description;
    $this->horary = $horary;
    $this->classification = $classification;
    $this->image = $image;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getImagem()
  {
    $imagemNome = "{$this->id}.png";
    if (!DW3ImagemUpload::existe($imagemNome)) {
      $imagemNome = 'padrao.png';
    }
    return $imagemNome;
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

  // public static function fetchId($id)
  // {
  //   $command = DW3BancoDeDados::prepare(self::SEARCH_ID);
  //   $command->bindValue(1, $id, PDO::PARAM_INT);
  //   $command->execute();
  //   $register = $command->fetch();
  //   return new User(
  //     $register['email'],
  //     '',
  //     $register['name'],
  //     $register['id']
  //   );
  // }

  // public static function fetchEmail($email)
  // {
  //   $command = DW3BancoDeDados::prepare(self::SEARCH_EMAIL);
  //   $command->bindValue(1, $email, PDO::PARAM_STR);
  //   $command->execute();
  //   $register = $command->fetch();
  //   $user = null;
  //   if ($register) {
  //     $user = new User(
  //       $register['email'],
  //       '',
  //       $register['name'],
  //       $register['id']
  //     );
  //     $user->password = $register['password'];
  //   }
  //   return $user;
  // }
}