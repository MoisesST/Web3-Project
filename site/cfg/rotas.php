<?php

$rotas = [
  '/home' => [
      'GET' => '\Controlador\HomeControlador#index',
  ],
  '/report' => [
    'GET' => '\Controlador\ReportControlador#show',
  ],
  '/sign-in' => [
    'GET' => '\Controlador\SignInControlador#create',
    'POST' => '\Controlador\SignInControlador#storage',
    'DELETE' => '\Controlador\SignInControlador#destruir',
  ],
  '/sign-up' => [
    'GET' => '\Controlador\SignUpControlador#create',
    'POST' => '\Controlador\SignUpControlador#storage',
  ],
  '/rolles' => [
    'GET' => '\Controlador\RollesControlador#create',
    'POST' => '\Controlador\RollesControlador#storage',
  ],
  '/cities' => [
    'GET' => '\Controlador\CitiesControlador#create',
    'POST' => '\Controlador\CitiesControlador#storage',
  ],
  // '/users' => [
  //   'POST' => '\Controlador\UsersControlador#storage',
  // ],
];
