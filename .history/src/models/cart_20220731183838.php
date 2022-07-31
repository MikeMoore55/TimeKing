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

    public function getProductName(){
        return $this->productName;
    }

    public function setProductName($productName){
        $this->productName = $productName;

        return $this;
    } 
    
    public function getProductPrice(){
        return $this-> productPrice;
    }

    public function setProductPrice($productPrice){
        $this->productPrice = $productPrice;

        return $this;
    } 

}

?>