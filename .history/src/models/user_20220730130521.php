<?php

class SignedInUser implements JsonSerializable{
    public $isSignedIn;
    public $userEmail;
    public $userPassword;
    public $userDisplayName;
    public $userCart;

    public function __construct($isSignedIn, $userEmail, $userPassword, $userDisplayName, $userCart)
    {   
        $this-> isSignedIn = $isSignedIn;
        $this-> userEmail = $userEmail;
        $this-> userPassword = $userPassword;
        $this-> userDisplayName = $userDisplayName;
        $this-> userCart = $userCart;
    }

    public function jsonSerialize() {
    
        $assocArray = [
            "isSignedIn" => $this-> isSignedIn,
            "userEmail" => $this-> userEmail,
            "userPassword" => $this-> userPassword,
            "userDisplayName" => $this-> userDisplayName,
            "userCart" => $this-> userCart
        ];

        return $assocArray;
    }

    public function getIsSignedIn(){
        return $this->isSignedIn;
    }

    public function setisSignedIn($isSignedIn){
        $this->isSignedIn = $isSignedIn;

        return $this;
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

    public function setUserCart($userCart){
        $this->userCart = $userCart;
    }
        
}
?>