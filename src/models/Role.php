<?php
namespace Model;
// namespace Aplication\Model;

class Role
{
  private int $id, $idUser, $classification;

  private string $name, $description, $photo, $city, $horary;

  public function __construct(
    int $classification,
    string $name,
    string $description,
    string $photo,
    string $city,
    string $horary)
  {
    $this->classification = $classification;
    $this->name = $name;
    $this->description = $description;
    $this->photo = $photo;
    $this->city = $city;
    $this->horary = $horary;
  }

  public function getIdUser()
  {
    return $this->idUser;
  }

  public function getClassification()
  {
    return $this->classification;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getPhoto()
  {
    return $this->photo;
  }

  public function getCity()
  {
    return $logic;
  }

  public function getHorary()
  {
    return $horary;
  }

  public function setIdUser(int $idUser)
  {
    $this->idUser = $idUser;
  }
}