<?php

use Appli\Controller\HomeController;
use Generic\App;
use Generic\Middlewares\TrailingSlashMiddleware;
use Generic\Router\Router;
use Generic\Router\RouterMiddleware;
use GuzzleHttp\Psr7\ServerRequest;

// Chargement de l'autoloader
require_once dirname(__DIR__) .  '/vendor/autoload.php';

// Création de le requête
$request = ServerRequest::fromGlobals();

// Ajout des routes dans le routeur
$router = new Router();
$router->addRoute('/home', new HomeController(), 'homepage');

// Création de la réponse
$app = new App([
    new TrailingSlashMiddleware(),
    new RouterMiddleware($router)
]);
$response = $app->handle($request);

// Renvoi de la réponse au navigateur
\Http\Response\send($response);
