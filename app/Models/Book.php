<?php
require_once 'Product.php';

class Book extends Product
{
    private int $weight_kg;
    private string $product_type = 'Book';

    public function __construct($sku, $product_name, $price_usd, $weight_kg)
    {
        $this->setSku($sku);
        $this->setName($product_name);
        $this->setPrice($price_usd);
        $this->setWeight($weight_kg);
    }

    public function setSku($sku): void
    {
        $this->sku = $sku;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setName($product_name): void
    {
        $this->product_name = $product_name;
    }

    public function getName(): string
    {
        return $this->product_name;
    }

    public function setPrice($price_usd): void
    {
        $this->price_usd = $price_usd;
    }

    public function getPrice(): int
    {
        return $this->price_usd;
    }

    public function setWeight($weight_kg): void
    {
        $this->weight_kg = $weight_kg;
    }

    public function getWeight(): int
    {
        return $this->weight_kg;
    }

    public function getProductType(): string
    {
        return $this->product_type;
    }
}