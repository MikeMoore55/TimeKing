<?php

class SelectedProduct implements JsonSerializable{

    public $id;
    public $name;
    public $description;
    public $rating;
    public $qty;
    public $picture;
    public $available;

    public function __construct($id, $name, $description, $rating, $qty, $picture, $available)
    {
        $this-> id = $id;
        $this-> name = $name;
        $this-> description = $description;
        $this-> rating = $rating;
        $this-> qty = $qty;
        $this-> picture = $picture;
        $this-> available = $available;
    }

}

?>