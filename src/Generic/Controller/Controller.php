<?php
namespace Generic\Controller;

use Generic\Renderer\TwigRenderer;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;

/**
 * Classe mère des contrôleurs PSR15 : fournit des méthodes utilitaires
 */
abstract class Controller implements MiddlewareInterface
{

    /**
     * @var TwigRenderer
     */
    private $twig;

    public function __construct(TwigRenderer $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Retourne l'HTML fourni dans une réponse (Response)
     * @param string $view - Vue TWIG
     * @param array $variables
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function render(string $view, array $variables = []): ResponseInterface {

        return new Response(200, [], $this->twig->render($view, $variables));
    }

}