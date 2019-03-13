<?php
namespace Generic\Middlewares;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        // Trouver l'URL
        $url = $request->getUri()->getPath();

        // Déterminer le dernier caractère de l'URL
        $lastCharacter = substr($url, -1);

        // Si le dernière caractère est un slash ("/")
        if ($lastCharacter === '/' && strlen($url) !== 1) {
            // Déterminer la nouvelle URL
            $newURL = substr($url, 0, -1);

            // Rediriger
            $response = new Response(301, [
                'Location' => $newURL
            ]);
            return $response;
        } else {
            // Sinon on appelle le middleware suivant
            return $handler->handle($request);
        }
    }
}
