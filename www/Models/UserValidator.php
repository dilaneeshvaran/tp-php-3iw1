<?php

namespace App\Models;

use App\Models\User;
class UserValidator {
    
    private User $user;
    private String $pwdConfirm;
    private array $errors = [];

    public function __construct(User $user, String $pwdConfirm){
        $this->user = $user;
        $this->pwdConfirm = $pwdConfirm;

        if(strlen($user->getFirstname()) < 2){
            $this->errors[] = "Le prénom doit faire plus de 2 caractères";
        }
        if(strlen($user->getLastname()) < 2){
            $this->errors[] = "Le nom doit faire plus de 2 caractères";
        }
        if(!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)){
            $this->errors[] = "L'email est invalide";
        }
        if(strlen($pwdConfirm) < 8 || 
           !preg_match("/[a-z]/", $pwdConfirm) ||
           !preg_match("/[0-9]/", $pwdConfirm) ||
           !preg_match("/[A-Z]/", $pwdConfirm)
        ) {
            $this->errors[]= "Le mot de passe doit faire au min 8 caractères avec min maj chiffres";
        } else if ($pwdConfirm !== $_POST['password']) {
            $this->errors[] = "Le mot de passe de confirmation ne correspond pas";
        }
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}