<?php

abstract class Product
{
    protected string $sku;
    protected string $product_name;
    protected string $price_usd;

    abstract public function setSku($sku);

    abstract public function getSku();

    abstract public function setName($product_name);

    abstract public function getName();

    abstract public function setPrice($price_usd);

    abstract public function getPrice();
}
