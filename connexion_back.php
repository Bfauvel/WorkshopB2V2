<?php

include_once 'config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

$mail = $_POST['mail'];
$req = $db->prepare('SELECT idUser, password FROM user WHERE Mail = :mail');
$req->bindParam(':mail', $mail);
$req->execute();
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
echo '<br>';
var_dump($isPasswordCorrect);

if ($isPasswordCorrect) {
    session_start();
    $_SESSION['membre'] = $resultat['idUser'];
    $_SESSION['mail'] = $mail;
    echo 'Vous êtes connecté !';
    header('Location: home.php');
    
}
 else {
    header('Location:connexion.php');
    ?>
    <script> document.getElementById("p6").style.color = 'red';</script>
    <?php

}