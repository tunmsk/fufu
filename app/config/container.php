<?php

$container = $app->getContainer();

// Twig
$container['view'] = function ($container) {
  $pathView = dirname(dirname(__DIR__));

  if(env('CACHE')){
    $cache = $pathView.'/cache';
  }else{
    $cache = false;
  }
  $view = new \Slim\Views\Twig($pathView.'/app/views', [
    'cache' => $cache
  ]);

  $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
  $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

  return $view;
};

// Medoo
$dataParams = array();
if(getenv('ENV') == 'local'){
  $dataParams['DB_TYPE'] = getenv('DBD_TYPE');
  $dataParams['DB_NAME'] = getenv('DBD_NAME');
  $dataParams['DB_SERVER'] = getenv('DBD_SERVER');
  $dataParams['DB_USER'] = getenv('DBD_USER');
  $dataParams['DB_PWD'] = getenv('DBD_PWD');
}elseif(getenv('ENV') == 'prod'){
  $dataParams['DB_TYPE'] = getenv('DBP_TYPE');
  $dataParams['DB_NAME'] = getenv('DBP_NAME');
  $dataParams['DB_SERVER'] = getenv('DBP_SERVER');
  $dataParams['DB_USER'] = getenv('DBP_USER');
  $dataParams['DB_PWD'] = getenv('DBP_PWD');
}
$container['medoo'] = function () {
  $medoo = new Medoo\Medoo([
      'database_type' => $dataParams['DB_TYPE'],
      'database_name' => $dataParams['DB_NAME'],
      'server' => $dataParams['DB_SERVER'],
      'username' => $dataParams['DB_USER'],
      'password' => $dataParams['DB_PWD']
  ]);
  return $medoo;
};

//Csrf
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard;
};
