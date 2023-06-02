<?php
require_once 'app/Interfaces/ProductRepositoryInterface.php';
require_once 'app/Database/Database.php';

class ProductRepository implements ProductRepositoryInterface
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM products WHERE active = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createBook(Book $book): bool
    {
        $sql = 'INSERT INTO products (sku,product_name,price_usd,product_type,weight_kg) VALUES (:sku,:product_name,:price_usd,:product_type,:weight_kg)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':sku', $book->getSku());
        $stmt->bindValue(':product_name', $book->getName());
        $stmt->bindValue(':price_usd', $book->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(':product_type', $book->getProductType());
        $stmt->bindValue(':weight_kg', $book->getWeight(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function createDVD(DVD $dvd): bool
    {
        $sql = 'INSERT INTO products (sku,product_name,price_usd,product_type,size_mb) VALUES (:sku,:product_name,:price_usd,:product_type,:size_mb)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':sku', $dvd->getSku());
        $stmt->bindValue(':product_name', $dvd->getName());
        $stmt->bindValue(':price_usd', $dvd->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(':product_type', $dvd->getProductType());
        $stmt->bindValue(':size_mb', $dvd->getSize());
        return $stmt->execute();
    }

    public function createFurniture(Furniture $furniture): bool
    {
        $sql = 'INSERT INTO products (sku,product_name,price_usd,product_type,height_cm,width_cm,length_cm) VALUES (:sku,:product_name,:price_usd,:product_type,:height_cm,:width_cm,:length_cm)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':sku', $furniture->getSku());
        $stmt->bindValue(':product_name', $furniture->getName());
        $stmt->bindValue(':price_usd', $furniture->getPrice(), PDO::PARAM_INT);
        $stmt->bindValue(':product_type', $furniture->getProductType());
        $stmt->bindValue(':height_cm', $furniture->getHeight());
        $stmt->bindValue(':width_cm', $furniture->getWidth());
        $stmt->bindValue(':length_cm', $furniture->getLength());
        return $stmt->execute();
    }

    public function deleteById(array $ids): bool
    {
        $sql = "UPDATE products SET active = 0 WHERE id IN (" . implode(',', array_fill(0, count($ids), '?')) . ") AND active = 1";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($ids);
    }
}