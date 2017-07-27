<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Respect\Validation\Validator;

class HomeController extends Controller {

  public function getHome(RequestInterface $request, ResponseInterface $response) {
    $datas = $this->medoo->select("posts", "*");
    // r($datas);
    $this->render($response, 'pages/home.twig', ["posts" => $datas]);
  }

  public function postHome(RequestInterface $request, ResponseInterface $response) {
    $errors = [];
    Validator::email()->validate($request->getParam('email')) || $errors['email'] = 'Votre email est invalide';
    if(!empty($errors)){
      $this->alert($errors, 'errors');
      return $this->redirect($response, 'home', 400);
    }else{
      $this->alert('Les champs on été remplis correctement');
      return $this->redirect($response, 'home');
    }
  }
}
