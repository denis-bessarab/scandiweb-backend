<?php

require_once 'app/Database/Database.php';
require_once 'app/Repositories/ProductRepository.php';
require_once 'app/Models/Book.php';
require_once 'app/Models/Dvd.php';
require_once 'app/Models/Furniture.php';

class ProductService
{

    private Database $database;
    private ProductRepository $productRepository;

    private array $createProductMethods = [
        'Book' => 'createBook',
        'DVD' => 'createDVD',
        'Furniture' => 'createFurniture',
    ];

    public function __construct()
    {
        $this->database = new Database();
        $this->productRepository = new ProductRepository($this->database);
    }

    public function getProducts(): string
    {
        return json_encode($this->productRepository->findAll());
    }

    private function getInput()
    {
        return json_decode(file_get_contents('php://input'));
    }

    public function createProduct(): string|int
    {
        $input = new InputData($this->getInput());
        $product_type = $input->getProductType();
        $method = $this->createProductMethods[$product_type];
        try {
            $this->productRepository->$method($input);
            http_response_code(200);
            return "Product successfully added";
        } catch (PDOException $e) {
            http_response_code(400);
            if ($e->getCode() === '45000') {
                return 'Product with this SKU code already exists';
            } else {
                return $e->getMessage();
            }
        }
    }

    public function deleteProducts(): string
    {
        $input = $this->getInput();
        $ids = $input->source;
        try {
            $this->productRepository->deleteById($ids);
            http_response_code(200);
            return "Products successfully deleted";
        } catch (PDOException $e) {
            http_response_code(400);
            return "Error: " . $e->getMessage();
        }
    }
}