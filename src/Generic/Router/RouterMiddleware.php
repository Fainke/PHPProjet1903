<?php
namespace Generic\Router;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouterMiddleware implements MiddlewareInterface
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Appel du contrôleur lié à la route ou renvoi d'une erreur 404
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Récupération de l'éventuel contrôleur
        $controller = $this->router->match($request);

        if (!is_null($controller)) {
            // S'il y a un contrôleur => on appelle sa méthode "process"
            $response = $controller->process($request, $handler);
        } else {
            // S'il n'y a pas de contrôleur => on renvoit une page 404
            $response = new Response(404, [], '<h1>Erreur 404 : Page introuvable</h1>');
        }
        return $response;
    }
}
