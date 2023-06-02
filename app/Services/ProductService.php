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
        $input = $this->getInput();
        $product_type = $input->product_type;
        try {
            switch ($product_type) {
                case 'Book':
                    $book = new Book($input->sku, $input->product_name, $input->price_usd, $input->weight_kg);
                    $this->productRepository->createBook($book);
                    break;
                case 'DVD':
                    $dvd = new DVD($input->sku, $input->product_name, $input->price_usd, $input->size_mb);
                    $this->productRepository->createDVD($dvd);
                    break;
                case 'Furniture':
                    $furniture = new Furniture($input->sku, $input->product_name, $input->price_usd, $input->height_cm, $input->width_cm, $input->length_cm);
                    $this->productRepository->createFurniture($furniture);
                    break;
                default:
                    throw new PDOException("Invalid product type: " . $product_type);
            }
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