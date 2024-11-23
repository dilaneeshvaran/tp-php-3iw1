<?php

namespace App\Models;
class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $countryid;
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
        return $this->countryid;
    }

    public function setCountry($countryid){
        $this->countryid=$countryid;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
}