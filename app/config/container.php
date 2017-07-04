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
if(getenv('ENV') == 'local'){
  $container['medoo'] = function () {
    $medoo = new Medoo\Medoo([
        'database_type' => getenv('DBD_TYPE'),
        'database_name' => getenv('DBD_NAME'),
        'server' => getenv('DBD_SERVER'),
        'username' => getenv('DBD_USER'),
        'password' => getenv('DBD_PWD')
    ]);
    return $medoo;
  };
}elseif(getenv('ENV') == 'prod'){
  $container['medoo'] = function () {
    $medoo = new Medoo\Medoo([
      'database_type' => getenv('DBP_TYPE'),
      'database_name' => getenv('DBP_NAME'),
      'server' => getenv('DBP_SERVER'),
      'username' => getenv('DBP_USER'),
      'password' => getenv('DBP_PWD')
    ]);
    return $medoo;
  };
}


//Csrf
$container['csrf'] = function () {
    return new \Slim\Csrf\Guard;
};
