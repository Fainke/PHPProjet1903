<?php

use Appli\Controller\AboutController;
use Appli\Controller\ContactController;
use Appli\Controller\HomeController;
use Generic\App;
use Generic\Middlewares\TrailingSlashMiddleware;
use Generic\Renderer\TwigRenderer;
use Generic\Router\Router;
use Generic\Router\RouterMiddleware;
use GuzzleHttp\Psr7\ServerRequest;

$rootDir = dirname(__DIR__);

// Chargement de l'autoloader
require_once $rootDir .  '/vendor/autoload.php';

// Création de le requête
$request = ServerRequest::fromGlobals();

// Initialiser TWIG
$twig = new TwigRenderer($rootDir .  '/templates');

// Ajout des routes dans le routeur
$router = new Router();
$router->addRoute('/', new HomeController($twig), 'homepage');
$router->addRoute('/contact', new ContactController($twig), 'contact');
$router->addRoute('/a-propos', new AboutController($twig), 'about');


// Création de la réponse
$app = new App([
    new TrailingSlashMiddleware(),
    new RouterMiddleware($router)
]);
$response = $app->handle($request);

// Renvoi de la réponse au navigateur
\Http\Response\send($response);
