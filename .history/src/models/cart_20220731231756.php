<?php
/* class for the shopping cart */
class Cart implements JsonSerializable{

    public $userName;
    public $productName;
    public $productPrice;

    public function __construct($userName, $productName, $productPrice)
    {
        $this-> userName = $userName;
        $this-> productName = $productName;
        $this-> productPrice = $productPrice;
    }

    public function jsonSerialize() {
        
        $assocArray = [
            "userName" => $this -> userName,
            "productName"  => $this -> productName,
            "productPrice" => $this -> productPrice,
        ];

        return $assocArray;

    }

    public function getUserName(){
        return $this-> userName;
    }

    public function setUserName($userName){
        $this->userName = $userName;

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