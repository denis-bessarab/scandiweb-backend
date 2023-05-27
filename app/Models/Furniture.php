<?php
require_once 'Product.php';

class Furniture extends Product
{
    private object $dimensions;

    private function __construct($sku, $name, $price, $dimensions)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setDimensions($dimensions);
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

    public function setDimensions($dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    public function getDimensions(): FurnitureDimensions
    {
        return $this->dimensions;
    }
}