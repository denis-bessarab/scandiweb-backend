<?php
require_once 'Product.php';

class Furniture extends Product
{
    private int $height_cm;
    private int $width_cm;
    private int $length_cm;

    private string $product_type = 'Furniture';

    public function __construct($sku, $name, $price, $height_cm, $width_cm, $length_cm)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setHeight($height_cm);
        $this->setWidth($width_cm);
        $this->setLength($length_cm);
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

    public function setHeight($height_cm): void
    {
        $this->height_cm = $height_cm;
    }

    public function getHeight(): int
    {
        return $this->height_cm;
    }

    public function setWidth($width_cm): void
    {
        $this->width_cm = $width_cm;
    }

    public function getWidth(): int
    {
        return $this->width_cm;
    }

    public function setLength($length_cm): void
    {
        $this->length_cm = $length_cm;
    }

    public function getLength(): int
    {
        return $this->length_cm;
    }

    public function getProductType(): string
    {
        return $this->product_type;
    }
}