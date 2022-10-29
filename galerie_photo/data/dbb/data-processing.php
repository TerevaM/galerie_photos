<?php
try {
    $dbLink = new PDO('mysql:host=localhost:3306;dbname=galerie_photo', 'root', '');
//users database
    $req_users = $dbLink->prepare('SELECT * from users');
    $req_users->execute();
    $tab_users = $req_users->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}
