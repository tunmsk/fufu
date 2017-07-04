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
  $medoo = new Medoo\Medoo([
      'database_type' => DB_TYPE,
      'database_name' => DB_NAME,
      'server' => DB_SERVER,
      'username' => DB_USER,
      'password' => DB_PWD
  ]);
  return $medoo;
};

//Csrf
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard;
};

// DebugBar
if(getenv('ENV') === "local"){
  $provider = new Kitchenu\Debugbar\ServiceProvider();
  $provider->register($app);
}
