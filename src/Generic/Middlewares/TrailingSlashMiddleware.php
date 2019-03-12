<?php
namespace Generic\Middlewares;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ {
    ResponseInterface, ServerRequestInterface
};
use Psr\Http\Server\ {
    MiddlewareInterface, RequestHandlerInterface
};

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
        if($lastCharacter === '/') {
            // Déterminer la nouvelle URL
            $newURL = substr($url, 0, -1);
            var_dump('Nouvelle :' . $newURL);

            // Rediriger
            $response = new Response(301, [
                'location' => $newURL
            ]);
            return $response;

        } else {
            // Sinon on appelle le middleware suivant
            return $handler->handle($request);
        }


        var_dump('Ancienne :' . $url);
        die('On est dans TrailingSlash Middleware');
    }
}