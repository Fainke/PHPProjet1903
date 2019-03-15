<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 13/03/2019
 * Time: 16:40
 */

namespace Appli\Controller;

use Generic\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ContactController extends Controller
{
    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->render('contact.twig');
    }
}
