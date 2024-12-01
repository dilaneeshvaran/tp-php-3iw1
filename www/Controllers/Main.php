<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\SQL;
class Main
{
    private $_pseudo;
    public function __construct() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->_pseudo = $_SESSION["firstname"] ?? null;
    }
    public function home(): void
    {
        $sql = new SQL();
        $page = $sql->getOneById("page",3);
        $view = new View("User/hello.php", "front.php");
        $view->addData("title", $page["title"]);
        $view->addData("description", $page["description"]);
        //echo $view;
    }
    public function getPseudo(): string
    {
        return $this->_pseudo;
    }
}