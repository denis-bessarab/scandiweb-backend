<?php

declare(strict_types=1);

abstract class Product
{
    // protected int $id;
    protected string $sku;
    protected string $name;
    protected string $price;

    // abstract public function setId();
    // abstract public function getId();

    abstract public function setSku($sku);
    abstract public function getSku();

    abstract public function setName($name);
    abstract public function getName();

    abstract public function setPrice($price);
    abstract public function getPrice();
}
