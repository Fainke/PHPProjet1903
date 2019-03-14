<?php
namespace Generic\Renderer;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Classe permettant de simplifier l'usage de TWIG
 */
class TwigRenderer
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * Initialise TWIG
     * @param string $path - Chemin du dossier des vues
     */
    public function __construct(string $path)
    {
        $loader = new FilesystemLoader($path);
        $this->twig = new Environment($loader, [
            'cache' => false
        ]);
    }

    /**
     * Rendre une vue TWIG (fichier avec extension ".twig") dans une chaîne de caractères
     * @param string $view - Fichier TWIG
     * @param array $variables - Les variables que je veux envoyer à TWIG
     * @return string - La page HTML
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $view, array $variables = []): string
    {
        return $this->twig->render($view, $variables);
    }
}
