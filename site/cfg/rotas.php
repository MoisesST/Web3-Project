<?php

$rotas = [
  '/' => [
    'GET' => '\Controlador\HomeControlador#index',
  ],
  '/report' => [
    'GET' => '\Controlador\ReportControlador#index',
  ],
  '/sign-in' => [
    'GET' => '\Controlador\SignInControlador#create',
    'POST' => '\Controlador\SignInControlador#storage',
    'DELETE' => '\Controlador\SignInControlador#delete',
  ],
  '/users/create' => [
    'GET' => '\Controlador\UserControlador#create',
  ],
  '/users' => [
    'POST' => '\Controlador\UserControlador#storage',
  ],
  '/rolles/create' => [
    'GET' => '\Controlador\RollesControlador#create',
  ],
  '/rolles' => [
    'POST' => '\Controlador\RollesControlador#storage',
  ],
  '/rolles/?' => [
    'DELETE' => '\Controlador\RollesControlador#delete'
  ],
  '/cities/create' => [
    'GET' => '\Controlador\CitiesControlador#create',
  ],
  '/cities' => [
    'POST' => '\Controlador\CitiesControlador#storage',
  ],
];
