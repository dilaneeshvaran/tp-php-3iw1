<?php
namespace App\Controllers;

use App\Core\View;
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
        $view = new View("User/hello.php", "front.php");
        //echo $view;
    }
    public function getPseudo(): string
    {
        return $this->_pseudo;
    }
}