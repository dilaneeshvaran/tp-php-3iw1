<?php
namespace App\Controllers;

use App\Core\View;
class Main
{
    private $_pseudo = "jkd";
    public function home(): void
    {
        $view = new View("User/hello.php", "front.php");
        echo $view;
    }
    public function getPseudo(): string
    {
        return $this->_pseudo;
    }
}