<?php
namespace Appli\Controller;

use Appli\Entity\Product;
use Generic\Controller\Controller;
use Generic\Database\Connection;
use Generic\Renderer\TwigRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeController extends Controller
{

    /**
     * @var Connection
     */
    private $connection;

    public function __construct(TwigRenderer $twig, Connection $connection)
    {
        parent::__construct($twig);

        $this->connection = $connection;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Récupération des produits en BDD
        $products = $this->connection->query(
            "SELECT * FROM product",
            Product::class
        );


        // Envoi des produits à la vue
        return $this->render('home.twig', [
            'products' => $products
        ]);
    }
}
