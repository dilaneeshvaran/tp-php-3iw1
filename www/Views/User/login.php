<?php
session_start();

use App\Models\User;
use App\Models\UserValidator;

$db = new \App\Core\SQL();

$error = [];

if(count($_POST)==2 && !empty($_POST["email"]) && !empty($_POST["password"])){
    $email = strtolower(trim($_POST["email"]));
    $pwd=$_POST["password"];

    $user = new User();
    $user = $db->getUserByEmail($email);

    if(empty($user) || !password_verify($pwd, $user["password"])){
        $errors[] = "Identifiants incorrects";
    }else{
        $_SESSION["log"] = true;
        $_SESSION["firstname"] = $user["firstname"];
        echo "success".$user["lastname"];
        header('Location: /main');
    }
}
echo "register ok!";
?>

<h1>Se Connecter</h1>

<?php
if(!empty($errors)){
    echo '<div style="background-color: red">';
    foreach ($errors as $error){
        echo '<li>'.$error.'</li>';
    }
    echo '</div>';
}
?>

<form method="POST">
    <input type="email" require name="email" placeholder="Votre Email"><br>
    <input type="password" required name="password" placeholder="Votre mot de passe"><br>
    <input type="submit" value="Se connecter">
</form>