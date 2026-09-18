<?php

class User
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Customer extends User
{
    public function getRole()
    {
        return "Customer";
    }
}

class AdminUser extends User
{
    private $isAdmin;
    private $location;

    public function __construct($name, $location)
    {
        parent::__construct($name);
        $this->isAdmin = true;
        $this->location = $location;
    }

    public function getRole()
    {
        return "Admin";
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }
}

$customer = new Customer("Pawan");
$admin = new AdminUser("Sabinaya", "Kathmandu");

echo $customer->getName() . " - " . $customer->getRole() . "<br>";
echo $admin->getName() . " - " . $admin->getRole() . "<br>";
echo "Admin: " . ($admin->isAdmin() ? "Yes" : "No") . "<br>";
echo "Location: " . $admin->getLocation();

?>