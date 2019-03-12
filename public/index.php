<?php

use Appli\Controller\HomeController;
use Generic\App;
use Generic\Middlewares\TrailingSlashMiddleware;
use GuzzleHttp\Psr7\ServerRequest;

// Chargement de l'autoloader
require_once dirname(__DIR__) .  '/vendor/autoload.php';

// Création de le requête
$request = ServerRequest::fromGlobals();

// Création de la réponse
$app = new App([
    new TrailingSlashMiddleware(),
    new HomeController()
]);
$response = $app->handle($request);

// Renvoi de la réponse au navigateur
\Http\Response\send($response);
