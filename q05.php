<?php

interface HasInfo
{
    public function getInfo();
}

class Address implements HasInfo
{
    private $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getInfo()
    {
        return $this->address;
    }
}

class Phone implements HasInfo
{
    private $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    public function getInfo()
    {
        return $this->phone;
    }
}

class User
{
    private $name;
    private $address;
    private $phone;

    public function __construct($name, Address $address, Phone $phone)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function displayInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Address: " . $this->address->getInfo() . "<br>";
        echo "Phone: " . $this->phone->getInfo();
    }
}

$address = new Address("Kathmandu");
$phone = new Phone("9800000000");

$user = new User("Sabinaya", $address, $phone);
$user->displayInfo();

?>