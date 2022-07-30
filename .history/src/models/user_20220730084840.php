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
}


?>