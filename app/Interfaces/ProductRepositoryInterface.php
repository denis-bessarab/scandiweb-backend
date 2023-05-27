<?php

interface ProductRepositoryInterface
{
    public function findAll();

    public function createProduct(Product $product);

    public function deleteById(array $ids);
}