<?php
require_once 'Product.php';

class Book extends Product
{
    private int $weight;

    public function __construct($sku, $name, $price, $weight)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setAttributes($weight);
    }

    public function setSku($sku): void
    {
        $this->sku = $sku;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setAttributes($weight): void
    {
        $this->weight = $weight;
    }

    public function getAttributes(): object
    {
        return json_decode($this->weight);
    }
}