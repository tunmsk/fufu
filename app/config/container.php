<?php

$container = $app->getContainer();

// Twig
$container['view'] = function ($container) {
  $pathView = dirname(dirname(__DIR__));

  if(getenv('CACHE')){
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
  $medoo = new Medoo\Medoo([
      'database_type' => getenv('DB_TYPE'),
      'database_name' => getenv('DB_NAME'),
      'server' => getenv('DB_SERVER'),
      'username' => getenv('DB_USER'),
      'password' => getenv('DB_PWD')
  ]);
  return $medoo;
};

//Csrf
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard;
};

// DebugBar
if(getenv('ENV') === 'local'){
  $provider = new Kitchenu\Debugbar\ServiceProvider();
  $provider->register($app);
}
