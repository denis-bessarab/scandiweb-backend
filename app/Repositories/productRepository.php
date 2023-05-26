<?php

use PDO;
use Product;

class ProductRepository implements ProductRepositoryInterface
{
    /** @var PDO $db */
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->db->query(
            'SELECT
                id,
                name
            FROM products
            WHERE active = 1'
        );

        $products = [];
        while ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product
                ->setId($result['id'])
                ->setName($result['name'])
            ;
        }
        return $products;
    }

    /**
     * @param int $id
     *
     * @return Product
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare(
            'SELECT
                id,
                name
            FROM products
            WHERE id = :id
                AND active = 1
            LIMIT 1'
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $product = new Product();
        $product
            ->setId($result['id'])
            ->setName($result['name'])
        ;
    }

    /**
     * @param Product $product
     *
     * @return int
     */
    public function create(Product $product)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products (
                name
            ) VALUES (
                :name
            )'
        );
        $stmt->bindValue(':name', $product->getName(), PDO::PARAM_STR);
        $stmt->execute();

        $id = $this->db->lastInsertId();
        $product->setId(￼$id);
        return $id;
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function update(Product $product)
    {
        $stmt = $this->db->prepare(
            'UPDATE products SET
                name = :name
            WHERE id = :id
                AND active = 1'
        );
        $stmt->bindValue(':name', $product->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $product->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function delete(Product $product)
    {
        $stmt = $this->db->prepare(
            'UPDATE products SET
                active = 0
            WHERE id = :id
                AND active = 1'
        );
        $stmt->bindValue(':id', $product->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }
}