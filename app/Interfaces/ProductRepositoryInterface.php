<?php

interface ProductRepositoryInterface
{
    public function findAll();

    public function createBook(InputData $input);

    public function createDVD(InputData $input);

    public function createFurniture(InputData $input);

    public function deleteById(array $ids);
}