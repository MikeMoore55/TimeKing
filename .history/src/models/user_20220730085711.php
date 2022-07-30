<?php

class SignedInUser implements JsonSerializable{
    public $userEmail;
    public $userPassword;
    public $userDisplayName;
    public $userCart;

    public function __construct($userEmail, $userPassword, $userDisplayName, $userCart)
    {
        $this-> userEmail = $userEmail;
        $this-> userPassword = $userPassword;
        $this-> userDisplayName = $userDisplayName;
        $this-> userCart = $userCart;
    }

    public function jsonSerialize() {
    
        $assocArray = [
            "userEmail" => $this-> userEmail,
            "userPassword" => $this-> userPassword,
            "userDisplayName" => $this-> userDisplayName,
            "userCart" => $this-> userCart
        ];

        return $assocArray;
    }

    public function getUserEmail(){
        return $this->userEmail;
    }

    public function setUserEmail($userEmail){
        $this->userEmail = $userEmail;

        return $this;
    }  
    
    public function getUserPassword(){
        return $this->userPassword;
    }

    public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;

        return $this;
    }

    public function getUserDisplayName(){
        return $this->userDisplayName;
    }

    public function setRate($userDisplayName){
        $this->userDisplayName = $userDisplayName;

        return $this;
    }

    public function getUserCart(){
        return $this->userCart;
    }

    public function setRating($userCart){
        $this->userCart = $userCart;
    }
        
}


?>