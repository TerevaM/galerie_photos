<?php

use App\Globals\Globals;

require_once('./data-processing.php');
require_once('../../vendor/autoload.php');

$globals = new Globals;
$post = $globals->getPOST();
session_start();
var_dump($post);
echo "<br>";
foreach($tab_users as $value) {
    echo "hash compte user :";
    echo $value['password'] . '<br>';
    if(password_verify($post['password2'], $value['password']) && $post['email2'] == $value['email']){
        echo "Meme mot de passe<br>";
        $_SESSION['prenom'] = $value['firstname'];
        $_SESSION['nom'] = $value['lastname'];
        $_SESSION['email'] = $value['email'];
        $_SESSION['rank'] = $value['rank'];
        var_dump($_SESSION);
        header('Location: ../../index.php');
        break;
    }
    else {
        header('Location: ../../compenents/pages/user.php?error=1');
    }
    echo "boucle foreach<br>";
}
echo "php <br>";