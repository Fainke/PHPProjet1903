<?php
namespace Generic\Middlewares;

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
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $url = $request->getUri()->getPath();

        var_dump($url);
        die('On est dans TrailingSlash Middleware');
    }
}