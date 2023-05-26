<?php
include_once 'config.php';

class Database extends Config
{
    public function fetch()
    {
        $sql = 'SELECT * FROM products';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function insert($sku, $attributes)
    {
        try {
            $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
            $sql = 'INSERT INTO products (sku,attributes) VALUES (:sku,:attributes)';
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute(['sku' => $sku, 'attributes' => $attributes]);
            echo "Product successfully added";
        } catch (PDOException $e) {
            http_response_code(400);
            echo $e->getMessage();
        }
    }

    public function delete($deleteList)
    {
        try {
            $sql = "DELETE FROM products WHERE id IN (" . implode(',', array_fill(0, count($deleteList), '?')) . ")";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($deleteList);
            echo "Products successfully deleted";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
