<?php
namespace Model;
// namespace Aplication\Model;

class City
{
  private int $id;

  private string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }
}