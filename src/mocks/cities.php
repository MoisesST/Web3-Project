<?php

namespace API;

class City {
  public int $id;
  public string $name;
}

$cities = [
  new City(0, "Guarapuava"),
  new City(1, "Maringá"),
  new City(2, "Cascavel")
];

// define('CITIES', $cities);