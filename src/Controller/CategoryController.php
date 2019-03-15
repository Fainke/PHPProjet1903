<?php
namespace Appli\Controller;

use Appli\Entity\Product;
use Generic\Controller\Controller;
use Generic\Database\Connection;
use Generic\Renderer\TwigRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CategoryController extends Controller
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
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Récupération des produits en BDD
        $categories = $this->connection->query(
            "SELECT * FROM category"
        );

        // Envoi des produits à la vue
        return $this->render('category.twig', [
            'categories' => $categories
        ]);
    }
}
