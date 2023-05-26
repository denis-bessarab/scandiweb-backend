<?php

use Product;

interface ProductRepositoryInterface
{
    public function findAll();

    public function create(Product $product);

    public function deleteById(array $ids);
}