<?php
include "config.php";

//Récupération du token depuis la variable $_GET
$token = $_GET['token'];

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

$req = $db->prepare("SELECT jeton FROM user WHERE jeton = '$token'");
$req->execute();
$resultat = $req->fetch();

if ($resultat) {
    
} else {
    //echo "<script>alert(\" Redirection vers la page d'accueil. \")</script>";
    //echo "<SCRIPT>document.location.href='index.php'</SCRIPT>";
}
?>

<!DOCTYPE html>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="page_d'inscription.css" charset="utf-8" />
<html>
    <head>
        <title>Mot de passe oublié</title>
    </head>
    <div id="fond_ecran" class="fond_ecran"/>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <form method="POST" action='modif_back.php?token=<?php echo $token ?>' onsubmit="return verifForm(this)">
                <input type="password" id="password1" class="fadeIn third" name="password" onblur="verifPassword(this)" placeholder="Mot de Passe">
                <p id="p3">Le mot de passe doit comporter au moins 7 caractères et au moins 1 chiffre</p>
                <input type="password" id="password2" class="fadeIn third" name="password_confirmation" placeholder="Confirmation du Mot de Passe" onBlur="verifConfirmPassword(this)">
                <p id="p4">Les mot de passe ne corespondent pas</p>
                <input type="submit" class="fadeIn fourth" value="Modifier">
            </form>
        </div>
    </div>
</html>