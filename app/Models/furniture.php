<?php 
    require_once 'product.php';

    class Furniture extends Product 
    {
        private object $dimensions;

        private function __construct($sku,$name,$price,$dimensions)
        {   
            $this->setSku($sku);
            $this->setName($name);
            $this->setPrice($price);
            $this->setDimensions($dimensions);
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

        public function setDimensions($dimensions) {
            $this->dimensions = $dimensions;
        }

        public function getDimensions() {
            return $this->dimensions;
        }
    }