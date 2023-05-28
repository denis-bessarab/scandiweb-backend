<?php

interface ProductRepositoryInterface
{
    public function findAll();

    public function createBook(Book $book);

    public function createDVD(DVD $dvd);

    public function createFurniture(Furniture $furniture);

    public function deleteById(array $ids);
}