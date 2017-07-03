<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ContactController extends Controller
{

  public function getContact(RequestInterface $request, $response)
  {
    $this->render($response, 'pages/contact.twig');
  }
}
