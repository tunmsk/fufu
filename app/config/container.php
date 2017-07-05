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
$container['medoo'] = function () {
  if (getenv('ENV') == 'local') {
    $db = "D";
  } elseif (getenv('ENV') == 'prod') {
    $db = "P";
  }
  $medoo = new Medoo\Medoo([
      'database_type' => getenv('DB'.$db.'_TYPE'),
      'database_name' => getenv('DB'.$db.'_NAME'),
      'server' => getenv('DB'.$db.'_SERVER'),
      'username' => getenv('DB'.$db.'_USER'),
      'password' => getenv('DB'.$db.'_PWD')
  ]);
  return $medoo;
};

//Csrf
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard;
};
