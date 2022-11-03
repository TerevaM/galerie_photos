<?php
session_start();
try {
    header('Location: ../../index.php');
    $dbLink = new PDO('mysql:host=localhost:3306;dbname=galerie_photo', 'root', '');
//create users database

$hash =  password_hash($_SESSION['password'], PASSWORD_DEFAULT);
$data = [
    'prenom' => $_SESSION['prenom'],
    'nom' => $_SESSION['nom'],
    'email' => $_SESSION['email'],
    'rank' => $_SESSION['rank'],
    'password' => $hash,
];
    $sql = "INSERT INTO users (firstname, lastname, email, rank, password) VALUES (:prenom, :nom, :email ,:rank, :password)";
    $dbLink->prepare($sql)->execute($data);
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}
