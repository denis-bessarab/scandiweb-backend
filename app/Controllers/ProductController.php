<?php

class ProductController
{
    public function getProducts(): string
    {
        require_once 'app/Database/Database.php';
        require_once 'app/Repositories/productRepository.php';
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: X-Requested-With');
        header('Content-Type: application/json');
        $database = new Database();
        $productRepository = new ProductRepository($database);
        $data = $productRepository->findAll();
        foreach ($data as $key => $product) {
            $newValue = get_object_vars(json_decode($product['product_attributes']));
            $data[$key]['product_attributes'] = $newValue;
        };
        return json_encode($data);
    }

    public function createProduct()
    {
        echo 'creating products from controller';
    }

    public function deleteProducts()
    {
        echo 'deleting products from controller';
    }
}