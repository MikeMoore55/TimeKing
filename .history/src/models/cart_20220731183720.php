<?php

class Cart implements JsonSerializable{

    public $productID;
    public $productName;
    public $productPrice;

    public function __construct($productID, $productName, $productPrice)
    {
        $this-> productID = $productID;
        $this-> productName = $productName;
        $this-> productPrice = $productPrice;
    }

    public function jsonSerialize() {
        
        $assocArray = [
            "productID" => $this -> productID,
            "productName"  => $this -> productName,
            "productPrice" => $this -> productPrice,
        ];

        return $assocArray;

    }

    public function getProductID(){
        return $this-> productID;
    }

    public function setProductID($productID){
        $this->productID = $productID;

        return $this;
    } 

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;

        return $this;
    } 
    
    public function getPrice(){
        return $this-> price;
    }

    public function setPrice($price){
        $this->price = $price;

        return $this;
    } 

}

?>