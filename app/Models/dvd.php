<?php 
    require_once 'product.php';

    class DVD extends Product 
    {
        private int $size;

        private function __construct($sku,$name,$price,$size)
        {   
            $this->setSku($sku);
            $this->setName($name);
            $this->setPrice($price);
            $this->setSize($size);
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

        public function setSize($size) {
            $this->size = $size;
        }

        public function getSize() {
            return $this->size;
        }
    }