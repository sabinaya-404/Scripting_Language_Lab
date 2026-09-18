<?php

class Product
{
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity)
    {
        if ($price < 0 || $quantity < 0) {
            throw new Exception("Price and quantity cannot be negative.");
        }

        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        if ($price >= 0) {
            $this->price = $price;
        }
    }

    public function setQuantity($quantity)
    {
        if ($quantity >= 0) {
            $this->quantity = $quantity;
        }
    }

    public function calculatePrice()
    {
        return $this->price * $this->quantity;
    }
}

$product = new Product("Keyboard", 1500, 2);

echo "Product: " . $product->getName() . "<br>";
echo "Total: " . $product->calculatePrice();

?>