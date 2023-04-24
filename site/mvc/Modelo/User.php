<?php

namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class User extends Modelo
{
  const SEARCH_ID = 'SELECT * FROM users WHERE id = ? LIMIT 1';
  const SEARCH_EMAIL = 'SELECT * FROM users WHERE email = ? LIMIT 1';
  const INSERT = 'INSERT INTO users(name, email, password) VALUES (?, ?, ?)';

  private $id;
  private $name;
  private $email;
  private $password;
  private $hashedPassword;

  public function __construct(
    $name,
    $email,
    $hashedPassword,
    $id = null
  ) {
    $this->id = $id;
    $this->setName($name);
    $this->setEmail($email);
    $this->hashedPassword = $hashedPassword;
    if ($hashedPassword != null) {
      $this->password = password_hash($hashedPassword, PASSWORD_BCRYPT);
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function verifyPassword($hashedPassword)
  {
    return password_verify($hashedPassword, $this->password);
  }

  public function checkErrors()
  {
    if (strlen($this->name) < 3) {
      $this->setErroMensagem('name', 'Must be at least 3 characters long.');
    }
    if (strlen($this->email) < 4) {
      $this->setErroMensagem('email', 'Must be at least 4 characters long.');
    }
    if (strlen($this->hashedPassword) < 4) {
      $this->setErroMensagem('password', 'Must be at least 4 characters long.');
    }
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
    $command->bindValue(2, $this->email, PDO::PARAM_STR);
    $command->bindValue(3, $this->password, PDO::PARAM_STR);
    $command->execute();
    $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
    DW3BancoDeDados::getPdo()->commit();
  }

  public static function fetchId($id)
  {
    $command = DW3BancoDeDados::prepare(self::SEARCH_ID);
    $command->bindValue(1, $id, PDO::PARAM_INT);
    $command->execute();
    $register = $command->fetch();
    return new User(
      $register['nome'],
      $register['email'],
      '',
      $register['id']
    );
  }

  public static function fetchEmail($email)
  {
    $command = DW3BancoDeDados::prepare(self::SEARCH_EMAIL);
    $command->bindValue(1, $email, PDO::PARAM_STR);
    $command->execute();
    $register = $command->fetch();
    $user = null;
    if ($register) {
      $user = new User(
        $register['name'],
        $register['email'],
        '',
        $register['id']
      );
      $user->password = $register['password'];
    }
    return $user;
  }
}