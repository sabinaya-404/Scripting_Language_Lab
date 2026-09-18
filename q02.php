<?php

class Bicycle
{
    public $brand;
    public $model;
    public $year;
    public $description = "A two-wheeled vehicle.";
    public $weight;

    public function getInfo()
    {
        return "$this->brand $this->model ($this->year)";
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight($kg = false)
    {
        if ($kg) {
            return $this->weight . " kg";
        }

        return ($this->weight * 2.20462) . " lb";
    }
}

$bike1 = new Bicycle();
$bike1->brand = "Giant";
$bike1->model = "Escape 3";
$bike1->year = 2023;
$bike1->setWeight(10);

$bike2 = new Bicycle();
$bike2->brand = "Trek";
$bike2->model = "FX 2";
$bike2->year = 2024;
$bike2->setWeight(12);

echo $bike1->getInfo() . " - " . $bike1->getWeight(true) . "<br>";
echo $bike2->getInfo() . " - " . $bike2->getWeight(true);

?>