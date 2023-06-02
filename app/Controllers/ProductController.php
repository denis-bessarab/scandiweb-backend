<?php
require_once 'app/Services/ProductService.php';

class ProductController
{

    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function getProducts(): string
    {
        return $this->productService->getProducts();
    }

    public function createProduct(): string
    {
        return $this->productService->createProduct();
    }

    public function deleteProducts(): string
    {
        return $this->productService->deleteProducts();
    }
}