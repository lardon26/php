<?php
//http://localhost:8080/mvc_source/app/home/method/
namespace app\controller;
use app\model\repository\MemoryProductRepository;
use app\model\repository\ProductRepositoryInterface;
class Home
{
    // Attribut pour accéder au modèle
    private $productRepository;

    // Modification du constructeur pour injecter l'instance de MemoryProductRepository
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        // Instanciation de l'attribut avec l'injection de dépendance
        $this->productRepository = $productRepository;
    }

    // Modification de la méthode index
    function index()
    {
        // Appel de la méthode findAll() du repository
        $products = $this->productRepository->findAll();

        // Affichage des résultats avec var_dump()
        var_dump($products);

        // Vous pouvez également envoyer ces données à la vue si nécessaire
    }
}