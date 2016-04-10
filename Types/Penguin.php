<?php

class Penguin {

    public $commonName;
    public $scientificName;
    public $favoriteFood;
    public $description;
    public $imageUrl;
    public $uuid;

    function __construct($common, $scientific, $food, $desc, $image, $uid) {
        $this->commonName = $common;
        $this->scientificName = $scientific;
        $this->favoriteFood = $food;
        $this->description = $desc;
        $this->imageUrl = $image;
        $this->uuid = $uid;
    }
}

?>
