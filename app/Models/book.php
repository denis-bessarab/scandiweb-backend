<?php 
    require_once 'product.php';

    class Book extends Product 
    {
        private int $weight;

        private function __construct($sku,$name,$price,$weight)
        {   
            $this->setSku($sku);
            $this->setName($name);
            $this->setPrice($price);
            $this->setWeight($weight);
        }
        
        public function setSku($sku){
            $this->sku = $sku;
        }

        public function getSku(){
            return $this->sku;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setWeight($weight) {
            $this->weight = $weight;
        }

        public function getWeight() {
            return $this->weight;
        }
    }