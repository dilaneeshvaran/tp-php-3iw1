<?php

namespace App\Controllers;

use App\Core\User as U;
use App\Core\View;
use App\Core\SQL;

class User
{

    public function register(): void
    {
        $sql = new SQL();
        //Faire une requete sql pour récupérer la page avec l'id
        $result = $sql->getMany("country");
        $page = $sql->getOneById("page", 2);
        //Créer une vue et envoyer à la vue toutes les informations provenant
        //de la BDD
        $view = new View("User/register.php", "back.php");
        $view->addData("countries", $result);
        $view->addData("title", $page["title"]);
        $view->addData("description", $page["description"]);
    }

    public function login(): void
    {
        $sql = new SQL();
        $page = $sql->getOneById("page", 1);
        $view = new View("User/login.php", "back.php");
        $view->addData("title", $page["title"]);
        $view->addData("description", $page["description"]);
    }

    public function logout(): void
    {
        $user = new U();
        $user->logout();
        header("Location: /se-connecter");
        exit();
    }
}
