<?php
class User
{
    // Properties
    private $fullName;
    private $userName;
    private $birthDate;
    private $phone;
    private $address;
    private $password;
    private $email;
    private $image;

    // Constructor
    public function __construct(
        $fullName,
        $userName,
        $birthDate,
        $phone,
        $address,
        $password,
        $email,
        $image
    ) {
        // echo "in user constructor" . '<br>';
        $this->fullName = $fullName;
        $this->userName = $userName;
        $this->birthDate = $birthDate;
        $this->phone = $phone;
        $this->address = $address;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
    }

    // Getters and Setters

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getImageName()
    {
        return $this->image;
    }

    public function setImageName($image)
    {
        $this->image = $image;
    }
}
