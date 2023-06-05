<?php

// namespace Teste\Unitario;

// use \Teste\Teste;
// use \Modelo\User;
// use \Framework\DW3BancoDeDados;

// class TesteUser extends Teste
// {
// 	public function testeInsert()
// 	{
//     $user = new User('Mary', 'mary@test.com', '12345');
//     $user->save();
//     $query = DW3BancoDeDados::query(
//       "SELECT * FROM users WHERE email = 'mary@test.com'"
//     );
//     $bdUser = $query->fetch();
//     $this->verificar($bdUser !== false);
// 	}

//   public function testeFetchID()
//   {
//     $user = new User('Mary', 'mary@test.com', '12345');
//     $user->save();
//     $user = User::fetchId('1'); // check if it is the same id being incremented in the database
//     $this->verificar($user !== false);
//   }

//   public function testeFetchEmail()
//   {
//   // $user = new User('id', 'name', 'email', 'hashedPassword'); // full = null
//   $user = new User('Mary', 'mary@test.com', '12345'); // warning values default / app4
//   $user->save();
//   $user = User::fetchEmail('email-teste');
//   $this->verificar($user !== false);
//   }
// }
