<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// The main difference with the previous code is that you have total control of the HTTP messages. You can create
// whatever request you want and you are in charge of sending the response whenever you see fit.
$request = Request::createFromGlobals();

$name = $request->get('name', 'World');

$response = new Response();
$response->setContent('Hello world!');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');

// or $response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));

$response->send();
