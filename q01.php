<?php
interface Vehicle
{
    public function startEngine();
    public function stopEngine();
}

class Car implements Vehicle
{
    private $make;
    private $model;
    private $year;

    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function startEngine()
    {
        return "Engine started.";
    }

    public function stopEngine()
    {
        return "Engine stopped.";
    }

    public function start()
    {
        return $this->startEngine();
    }

    public function displayInfo()
    {
        return "$this->make $this->model ($this->year)";
    }

    public function getMake()
    {
        return $this->make;
    }

    public function setMake($make)
    {
        $this->make = $make;
    }

    public function getDescription()
    {
        return $this->displayInfo();
    }
}

class ElectricCar extends Car
{
    private $batteryCapacity;

    public function __construct($make, $model, $year, $batteryCapacity)
    {
        parent::__construct($make, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function charge()
    {
        return "Battery charging.";
    }

    public function getDescription()
    {
        return parent::getDescription() .
            " | Battery: {$this->batteryCapacity} kWh";
    }
}

$car = new Car("Toyota", "Corolla", 2020);
$electric = new ElectricCar("Tesla", "Model 3", 2024, 75);

echo $car->getDescription() . "<br>";
echo $electric->getDescription() . "<br>";
echo $electric->charge();

?>