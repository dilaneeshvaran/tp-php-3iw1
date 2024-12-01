<?php

use App\Controllers\Main;
use App\Controllers\Page;

$main = new Main();

if (isset($_SESSION["firstname"])) {
   if ($main->getPseudo() == $_SESSION["firstname"]) {
      echo "Welcome back " . $main->getPseudo();
      echo '<br><a href="/se-deconnecter">Se déconnecter</a>';
   }

   $page = new Page();
} else {
   header('Location: /se-connecter');
}
