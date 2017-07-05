<?php

require 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if(getenv('ENV') == "local"){
  $database_default = "development";
}elseif(getenv('ENV') == "prod"){
  $database_default = "production";
}

return [
  'paths' => [
    'migrations' => __DIR__ . '/app/database/migrations',
    'seeds' => __DIR__ . '/app/database/seeds'
  ],
  'environments' => [
    'default_database' => $database_default,
    'development' => [
      'adapter' => getenv('DBD_TYPE'),
      'host' => getenv('DBD_SERVER'),
      'name' => getenv('DBD_NAME'),
      'user' => getenv('DBD_USER'),
      'pass' => getenv('DBD_PWD')
    ],
    'production' => [
      'adapter' => getenv('DBP_TYPE'),
      'host' => getenv('DBP_SERVER'),
      'name' => getenv('DBP_NAME'),
      'user' => getenv('DBP_USER'),
      'pass' => getenv('DBP_PWD')
    ]
  ]
];
