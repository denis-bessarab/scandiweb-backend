<?php
require_once 'Product.php';

class DVD extends Product
{
    private int $size;

    private function __construct($sku, $name, $price, $size)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setAttributes($size);
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

    public function setAttributes($size): void
    {
        $this->size = $size;
    }

    public function getAttributes(): object
    {
        return json_decode($this->size);
    }
}