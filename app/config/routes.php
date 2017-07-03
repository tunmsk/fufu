<?php

use App\Controllers\HomeController;
use App\Controllers\ContactController;

$app->get('/', HomeController::class. ':getHome')->setName('home');
$app->post('/', HomeController::class. ':postHome');
$app->get('/contact', ContactController::class. ':getContact')->setName('contact');
