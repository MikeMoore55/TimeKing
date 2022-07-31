<?php

/* selected product class */

class SelectedProduct implements JsonSerializable{

    public $id;
    public $name;
    public $description;
    public $price;
    public $rating;
    public $qty;
    public $picture;
    public $available;

    public function __construct($id, $name, $description, $price, $rating, $qty, $picture, $available)
    {
        $this-> id = $id;
        $this-> name = $name;
        $this-> description = $description;
        $this-> price = $price;
        $this-> rating = $rating;
        $this-> qty = $qty;
        $this-> picture = $picture;
        $this-> available = $available;
    }

    public function jsonSerialize() {
        
        $assocArray = [
            "id" => $this -> id,
            "name"  => $this -> name,
            "description" => $this -> description,
            "price" => $this -> price,
            "rating" => $this -> rating,
            "qty" => $this ->qty,
            "picture" => $this -> picture,
            "available" => $this -> available
        ];

        return $assocArray;

    }

    public function getId(){
        return $this-> id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    } 

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;

        return $this;
    } 

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;

        return $this;
    }
    
    public function getPrice(){
        return $this-> price;
    }

    public function setPrice($price){
        $this->price = $price;

        return $this;
    } 

    public function getRating(){
        return $this->rating;
    }

    public function setRating($rating){
        $this->rating = $rating;

        return $this;
    } 

    public function getQty(){
        return $this->qty;
    }

    public function setQty($qty){
        $this->qty = $qty;

        return $this;
    } 

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;

        return $this;
    } 

    public function getAvailable(){
        return $this->available;
    }

    public function setAvailable($available){
        $this->available = $available;

        return $this;
    } 

}

?>