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
    }
}


?>