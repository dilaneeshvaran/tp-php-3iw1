<?php

namespace App\Core;

use App\Models\User;
class SQL
{

    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new \PDO("mysql:host=mariadb;dbname=esgi","esgi","esgipwd");
        }catch(\Exception $e){
            die("Erreur SQL :".$e->getMessage());
        }
    }

    public function getOneById(string $table,int $id): array
    {
       $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$table." WHERE id=:id");
       $queryPrepared->execute([
               "id"=>$id
           ]);
       return $queryPrepared->fetch();
    }

    public function getMany(string $table):array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$table);
        $queryPrepared->execute([]);
        return $queryPrepared->fetchAll();
    }

    public function createUser(User $user){
        $queryPrepared=$this->pdo->prepare("INSERT INTO user (firstname, lastname, email, password, countryid) VALUES (:firstname, :lastname, :email, :password, :countryid)");
        $queryPrepared->execute([
            "firstname"=>$user->getFirstname(),
            "lastname"=>$user->getLastname(),
            "email"=>$user->getEmail(),
            "password"=>$user->getPassword(),
            "countryid"=>$user->getCountry()
        ]);
    }

    public function getUserByEmail($email){
        $queryPrepared = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $queryPrepared->execute([
            "email" => $email
        ]);
        return $queryPrepared->fetch();
    }

}