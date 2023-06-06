<?php

class InputData
{
    private string $sku;
    private string $product_name;
    private int $price_usd;
    private string $product_type;
    private null|int $size_mb;
    private null|int $weight_kg;
    private null|int $height_cm;
    private null|int $width_cm;
    private null|int $length_cm;

    public function __construct($input)
    {
        $this->setSku($input->sku);
        $this->setProductName($input->product_name);
        $this->setPriceUsd($input->price_usd);
        $this->setProductType($input->product_type);
        $this->setSizeMb($input->size_mb);
        $this->setWeightKg($input->weight_kg);
        $this->setHeightCm($input->height_cm);
        $this->setWidthCm($input->width_cm);
        $this->setLengthCm($input->length_cm);
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getProductName(): string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    public function getPriceUsd(): int
    {
        return $this->price_usd;
    }

    public function setPriceUsd(int $price_usd): void
    {
        $this->price_usd = $price_usd;
    }

    public function getProductType(): string
    {
        return $this->product_type;
    }

    public function setProductType(string $product_type): void
    {
        $this->product_type = $product_type;
    }

    public function getSizeMb(): ?int
    {
        return $this->size_mb;
    }

    public function setSizeMb(?int $size_mb): void
    {
        $this->size_mb = $size_mb;
    }

    public function getWeightKg(): ?int
    {
        return $this->weight_kg;
    }

    public function setWeightKg(?int $weight_kg): void
    {
        $this->weight_kg = $weight_kg;
    }

    public function getHeightCm(): ?int
    {
        return $this->height_cm;
    }

    public function setHeightCm(?int $height_cm): void
    {
        $this->height_cm = $height_cm;
    }

    public function getWidthCm(): ?int
    {
        return $this->width_cm;
    }

    public function setWidthCm(?int $width_cm): void
    {
        $this->width_cm = $width_cm;
    }

    public function getLengthCm(): ?int
    {
        return $this->length_cm;
    }

    public function setLengthCm(?int $length_cm): void
    {
        $this->length_cm = $length_cm;
    }
}