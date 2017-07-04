<?php

// Autoload de composer
require '../vendor/autoload.php';

// Initialisation du .env
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load(true);

// Configuration slim pour les messages d'erreurs
$configuration = [
  'settings' => [
    'displayErrorDetails' => env('ENV'),
  ],
];

// Initialisation des paramètres du container slim
$c = new \Slim\Container($configuration);
require '../app/config/error_pages.php';

// Initialisation de Slim
$app = new \Slim\App($c);

// Initialisation des sessions/cookies
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

// Le container qui compose nos librairies
require '../app/config/container.php';

// Appel des middlewares
require '../app/config/middlewares.php';

// Le fichier ou l'on déclare les routes
require '../app/config/routes.php';

// Execution de Slim
$app->run();
