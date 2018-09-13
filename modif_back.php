<?php

include_once 'config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

$token = $_GET['token'];
$passe = $_POST['password'];
$passe1 = $_POST['password_confirmation'];

 if ($passe == $passe1) {
     
$passe = password_hash($_POST['password'], PASSWORD_DEFAULT);

$creation = $db->prepare("UPDATE user SET password = '$passe' WHERE jeton='$token'");
$creation->execute();
var_dump($creation);
$res = $creation->fetch();

header('Location: connexion.php');
 }
 else
 {
     header('Location: modif_password.php');
    //alert('Vous ne faites pas partit du campus');
 }