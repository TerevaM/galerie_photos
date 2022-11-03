<?php

use App\Globals\Globals;

function start_page($title, $link_css) {
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php if($link_css): echo $link_css; endif;?>style.css">
    <title><?= $title ?></title>
</head>
<body class="bg-dark text-white">

<?php
}

function end_page() {
    ?>
</body>

</html>
<?php
}

function navbar($link_index, $link_page) {

    
    
    session_start();
    $globals = new Globals;
    $get = $globals->getGET();
if(!empty($get) && isset($get['disconnect']) && $get['disconnect'] == 1) {
    session_destroy();
      header('Location: ../../index.php');
}
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand m-2 px-3" href="<?= $link_index ?>index.php">Page d'accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100 mx-5 position-relative">
                <li class="nav-item">
                <a class="nav-link d-flex justify-content-center" href="<?= $link_page ?>albums.php">Albums Photos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex justify-content-center" href="<?= $link_page ?>apropos.php">A propos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link d-flex justify-content-center" href="<?= $link_page ?>contact.php">Contact</a>
                </li>
                <?php if(empty($_SESSION)) { ?>

                <li class="nav-item">
                <a class="nav-link d-flex justify-content-center" href="<?= $link_page ?>user.php">Connexion / Inscription</a></li>
                <?php }
                else {
                ?>
                <?php
                if($_SESSION['rank'] == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-center" href="<?= $link_page ?>admin.php">Page Admin</a>
                </li>
                <?php } ?>
                        <a class="position-absolute end-0" href="<?= $link_page ?>compte.php">
                <img src="https://avatars.dicebear.com/api/initials/<?=substr($_SESSION['prenom'], 0, 1). substr($_SESSION['nom'], 0, 1) ?>.svg"id="logo_account" alt="">
                </a>
                
               <?php } ?>
                
            </ul>
        </div>
    </nav>
</header>


<?php
}