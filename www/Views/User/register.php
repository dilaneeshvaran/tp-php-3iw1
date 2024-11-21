<?php

use App\Models\User;
use App\Models\UserValidator;

$db = new \App\Core\SQL();

$errors = [];

if(count($_POST)==5 && !empty($_POST["firstname"]) && !empty($_POST["lastname"])
    && !empty($_POST["email"]) && !empty($_POST["password"])
    && !empty($_POST["passwordConfirm"])){

        $user = new User();
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setCountry($_POST['country']);

        $validator = new UserValidator($user, $_POST["passwordConfirm"]);
        $errors= $validator->getErrors();
        if(empty($errors)){
            echo "insert to sql database";
        }
    }
?>

<?php

if(!empty($errors)){
    echo '<div style="background-color: red">';
    foreach ($errors as $error)
    {
        echo '<li>'.$error.'</li>';
    }
    echo '</div>';
}   
?>

<form method="post">
    <input type="text" placeholder="votre nom"><br>
    <input type="text" placeholder="votre prénom"><br>
    <input type="email" placeholder="votre email"><br>
    <select>
        <?php foreach ($countries as $country): ?>
            <option value="<?=htmlspecialchars($country['alpha2']); ?>">
                <?=htmlspecialchars($country['name']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="password" placeholder="votre mot de passe"><br>
    <input type="password" placeholder="confirmation"><br>
    <input type="submit" value="S'inscrire"><br>
</form>