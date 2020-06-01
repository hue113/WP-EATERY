<?php

class Menuitem
{
    private $itemName;
    private $description;
    private $price;

    public function __construct($itemName, $description, $price ){
        $this->itemName=$itemName;
        $this->description=$description;
        $this->price=$price;
    }

    public function set_itemName($itemName) {
        $this->itemName = $itemName;
    }
    public function get_itemName() {
        return $this->itemName;
    }

    public function set_description($description) {
        $this->description = $description;
    }
    public function get_description() {
        return $this->description;
    }

    public function set_price($price) {
        $this->price = $price;
    }
    public function get_price() {
        return $this->price;
    }
}

?>
