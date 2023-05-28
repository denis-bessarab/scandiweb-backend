<?php
require_once 'Product.php';

class DVD extends Product
{
    private int $size_mb;

    private string $product_type = 'DVD';

    public function __construct($sku, $product_name, $price_usd, $size_mb)
    {
        $this->setSku($sku);
        $this->setName($product_name);
        $this->setPrice($price_usd);
        $this->setSize($size_mb);
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

    public function setSize($size_mb): void
    {
        $this->size_mb = $size_mb;
    }

    public function getSize(): int
    {
        return $this->size_mb;
    }

    public function getProductType(): string
    {
        return $this->product_type;
    }
}