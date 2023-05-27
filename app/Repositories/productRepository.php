<?php
require_once 'app/Interfaces/ProductRepositoryInterface.php';
require_once 'app/Database/Database.php';

class ProductRepository implements ProductRepositoryInterface
{
    private Database $database;
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->conn = $database->getConnection();
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM products WHERE active = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createProduct(Product|Book|Furniture|DVD $product): bool
    {
        $sql = 'INSERT INTO products (sku,product_name,price_usd,product_attributes) VALUES (:sku,:product_name,:price_usd,:product_attributes)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':sku', $product->getSku());
        $stmt->bindValue(':product_name', $product->getName());
        $stmt->bindValue(':price_usd', $product->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(':product_attributes', $product->getAttributes());
        return $stmt->execute();
    }

    public function deleteById(array $ids): bool
    {
        $ids = array(1, 2, 3, 4);
        $sql = 'UPDATE products SET active = 0 WHERE id IN :id AND active = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $ids);
        return $stmt->execute();
    }
}