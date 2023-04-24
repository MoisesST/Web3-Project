<?php

namespace MOCKS\ROLLES;

// use API\User;
// use API\City;

// class City {
//   public int $id;
//   public string $name;
// }

// $cities = [
//   new City(0, "Guarapuava"),
//   new City(1, "Maringá"),
//   new City(2, "Cascavel")
// ];

// // var_dump($cities);

// class User {
//   public int $id;
//   public string $name;
//   public string $email;
//   public string $password;
// }

// $users = [
//   new User(0, "Ana Santos", "Ana123@gmail.com", "Ana123"),
//   new User(1, "João Bernado", "João123@gmail.com", "João123"),
//   new User(2, "Bia Peixoto", "Bia123@gmail.com", "Bia123")
// ];

// class Role {
//   public int $id;
//   public User $user;
//   public City $city;
//   public string $name;
//   public string $description;
// }

// $roles = [
//   new Role(
//     0,
//     $users[0],
//     $cities[0],
//     "Shopping Cidade dos Lagos",
//     "Contrary to popular belief, Lorem Ipsum is not simply random text It has"
//   ),
//   new Role(
//     1,
//     $users[1],
//     $cities[1],
//     "Parque dos Lagos",
//     "Contrary to popular belief, Lorem Ipsum is not simply random text It has
//     Contrary to popular belief, Lorem Ipsum is not simply random text It has"
//   ),
//   new Role(
//     2,
//     $users[2],
//     $cities[2],
//     "Cilla Tech Park",
//     "Contrary to popular belief, Lorem Ipsum is not simply random text It has
//     Contrary to popular belief, Lorem Ipsum is not simply random text It has
//     Contrary to popular belief, Lorem Ipsum is not simply random text It has"
//   ),
// ];

// var_dump($roles);

// class Role {
//   public int $id;
//   public User $user;
//   public City $city;
//   public string $name;
//   public string $description;
// }

$rolles = [
  [
    "id" => 0,
    "user" => "Ana Santos",
    "name" => "Shopping Cidade dos Lagos",
    "city" => "Guarapuava",
    "description" => "Contrary to popular belief, Lorem Ipsum is not simply random text It has"
  ],
  [
    "id" => 1,
    "user" => "João Bernado",
    "name" => "Parque dos Lagos",
    "city" => "Maringá",
    "description" => "Contrary to popular belief, Lorem Ipsum is not"
  ],
  [
    "id" => 2,
    "user" => "Bia Peixoto",
    "name" => "Cilla Tech Park",
    "city" => "Cascavel",
    "description" => "belief, Lorem Ipsum is not simply random text It has"
  ],
];