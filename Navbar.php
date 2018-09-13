<!DOCTYPE html>

<?php

include 'bootstrap.php';
include_once 'Config.php';

$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
?>

<html>
    <head>
        <title>Navbar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <link href="Navbar.css" rel="stylesheet" type="text/css"/>
        <div class="header">
            <div class="user_info">
                <img class="profile_pict_small" src="medias/user.jpg">
                <?php
                $req = $db->prepare("SELECT `LastName`, `FirstName` FROM `User` WHERE idUser=$idU");
                $req->execute();
                $name = $req->fetchAll();
                $nom = $name[0]['LastName'];
                $prenom = $name[0]['FirstName'];
                ?>
                <p class="profile_name"><?php echo $prenom . " " . $nom ?></p>
            </div>
            <form class="searchbar" action="home.php" method="get">
                <input class="search-place" type="text" name="place" placeholder="Ville">
                <select class="search-category" name="category" placeholder="Catégorie">
                    <option value="">- Catégorie -</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Kebab">Kebab</option>
                </select>
                <input class="search-btn" type="submit" value="Rechercher"> <!-- Bouton de recherche -->
            </form>
            <div class="disconnect">
                <a href="home.php"><img class="home-btn" src="medias/home.png"></a>
                <a href="disconnect.php"><img class="disconnect-btn" src="medias/sign_out.png"><a/>
                <!-- <input class="disconnect-btn" type="button" value="Déconnexion"> -->
            </div>
        </div>
    </body>
</html>

