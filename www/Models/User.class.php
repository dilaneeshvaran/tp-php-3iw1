<?php

namespace App\Models;
class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $country;
    public function getFirstname(){
        return $this->firstname;
    }

    public function setFirstname($firstname){
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function setLastname($lastname){
        $this->lastname = strtoupper(trim($lastname));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = strtolower(trim($email));
    }

    public function getCountry(){
        return $this->country;
    }

    public function setCountry($country){
        $this->country=$country;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}