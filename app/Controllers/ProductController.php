<?php
require_once 'app/Database/Database.php';
require_once 'app/Repositories/productRepository.php';
require_once 'app/Models/Book.php';
require_once 'app/Models/Dvd.php';
require_once 'app/Models/Furniture.php';

class ProductController
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
        $data = $this->productRepository->findAll();
        return json_encode($data);
    }

    public function createProduct(): string
    {
        $input = json_decode(file_get_contents('php://input'));
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

            }
            http_response_code(200);
            return "Product successfully added";

        } catch (PDOException $e) {
            http_response_code(400);
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteProducts(): string
    {
        $input = json_decode(file_get_contents('php://input'));
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