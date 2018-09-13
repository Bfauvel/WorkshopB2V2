<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include_once 'config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
//Met à jour la base de donnée du membre en y insérant un token (jeton).
$email = $_POST['email'];

//    $req = $db->prepare('SELECT Mail FROM user WHERE Mail = :mail');
//    $req->bindParam(':mail', $email);
//    $req->execute();
//    $res = $req->fetch();
//    
//    if ($res['Mail'] == $email) {
$token = sha1(uniqid(rand()));
echo '<br>';

$req2 = $db->prepare("UPDATE user SET jeton = '$token' WHERE Mail='$email'");
$req2->execute();

$result = $req2->fetch();

$to = $email;
$sujet = 'Oubli du mot de passe';
$body = 'Bonjour, vous avez oublié votre mot de passe, cliquez sur le lien présent pour le réinitialiser : http://localhost/WorkshopB2/modif_password.php?token=' . $token . '';

function smtpmailer($to, $sujet, $body) {
    global $error;
    $envoiemail = new PHPMailer();
    $envoiemail->IsSMTP();   // active SMTP
    $envoiemail->SetLanguage('fr');
    $envoiemail->CharSet = 'utf-8';
    $envoiemail->SMTPDebug = 1; // debogage: 1 = Erreurs et messages, 2 = messages seulement
    $envoiemail->FromName = "Course";
    $envoiemail->SMTPAuth = true;  // Authentification SMTP active
    $envoiemail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
    $envoiemail->Host = 'smtp.gmail.com';
    $envoiemail->Port = 465;
    $envoiemail->Username = "benjamin.strabach@gmail.com";
    $envoiemail->Password = "Epsi2018!";
    $envoiemail->setFrom("benjamin.strabach@gmail.com");


    $envoiemail->Subject = $sujet;
    $envoiemail->Body = $body;
    $envoiemail->AddAddress($to);
    if ($envoiemail->Send()) {
        $error = 'Mail error: ' . $envoiemail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent';
        return true;
    }
}

smtpmailer($to, $sujet, $body);

if (false) {
    echo "<center><p id='mauvais'>Adresse mail non inscrite.</p></center><br>";
} else if (true) {
    header('Location: envoie_mail.php');
}
