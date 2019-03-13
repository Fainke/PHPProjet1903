<?php

namespace Generic\Router;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route;

class Router
{
    /**
     * @var FastRouteRouter
     */
    private $routerVendor;

    public function __construct()
    {
        $this->routerVendor = new FastRouteRouter();
    }

    /**
     * Ajoute une route dans le routeur
     * @param string $url
     * @param MiddlewareInterface $controller
     * @param string|null $name - Nom unique de la route
     */
    public function addRoute(
        string $url,
        MiddlewareInterface $controller,
        ?string $name = null
    ): void {
        // On crée un objet "Route" pour le passer au "vrai" routeur
        $route = new Route($url, $controller, null, $name);

        // On appelle la fonction du "vrai" routeur pour ajouter une route
        $this->routerVendor->addRoute($route);
    }

    /**
     * Renvoit le contrôleur lié à l'URL de la requête donnée
     * @param ServerRequestInterface $request
     * @return MiddlewareInterface|null
     */
    public function match(ServerRequestInterface $request): ?MiddlewareInterface
    {
        $result = $this->routerVendor->match($request);

        if ($result->isSuccess()) {
            // J'ai une route
            $route = $result->getMatchedRoute()->getMiddleware();
        } else {
            // J'ai pas de route => page 404
            $route = null;
        }

        return $route;
    }
}
