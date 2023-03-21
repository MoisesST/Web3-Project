<?php
namespace Model;
// namespace Aplication\Model;

class User
{
  private int $id;

  private string $name, $email, $password;

  public function __construct(string $name, string $email, string $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPassword()
  {
    return $this->password;
  }
}