<?php
include 'bootstrap.php';
include_once 'Config.php';
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

if (isset($_GET['place'])){
    $searchP = $_GET['place'];
} else {
    $searchP = "";
}
if (isset($_GET['category'])){
    $searchC = $_GET['category'];
} else {
    $searchC = "";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="page_home.css" rel="stylesheet" type="text/css"/>
    <title>Home</title>
</head>

<body>
<!-- <div id="fond_ecran" class="fond_ecran"></div> -->
    <div class="fg">
        <?php include 'navbar.php'; ?>
        <?php 
        if($searchP != "" && $searchC != ""){   //Tout plein
            $sql = $db->prepare("SELECT resto.idR,, `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC 
                                 WHERE resto.Ville LIKE '%$searchP%' && categories.LabelC='$searchC'
                                 ORDER BY classement asc");
        } else if($searchP != "" && $searchC == "") { //Ville mais pas Catégorie
            $sql = $db->prepare("SELECT resto.idR,, `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC 
                                 WHERE resto.Ville LIKE '%$searchP%'
                                 ORDER BY classement asc");
        } else if($searchC != "" && $searchP == ""){  //Pas Ville mais Catégorie
            $sql = $db->prepare("SELECT resto.idR, `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC 
                                 WHERE categories.LabelC='$searchC'
                                 ORDER BY classement asc");
        } else {    //Tout vide
            $sql = $db->prepare("SELECT resto.idR, `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC
                                 ORDER BY classement asc");
        }

        // $sql = $db->prepare("SELECT `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
        //                      JOIN `categories` ON resto.idC = categories.idC");
        $sql->execute();
        $result = $sql->fetchAll();
        ?>

        <div class="search_list">
            <?php 
            for ($i = 0; $i < count($result); $i++) {
                $idR = $result[$i][0];
                $sqa = $db->prepare("SELECT COUNT(*) FROM avis where idR=$idR");
                $sqa->execute();
                $token = $sqa->fetch();
                $hrefR = '"pageResto?idR=' . $result[$i][0] . '"';
                if ($i == 0) {
                    $tMax = $token[0];
                }
                $progress = $token[0]*100;
                $progress /= $tMax;
                
                $address = $result[$i][2] . ", " . $result[$i][3] . " " . $result[$i][4];
                ?> 
                <div class="list">
                    <strong class="place_name"> <a href=<?php echo($hrefR)?>><?php echo($result[$i][1])?></a></strong>
                    <p class="place_address"><?php echo($address)?></p>
                    <div class="category">
                        <img class="category_pict" src="medias/category.png">
                        <p class="category_text"><?php echo($result[$i][5])?></p>
                    </div>
                    <div class="token_score">
                        <p class="token_score_text"><?php echo($token[0])?></p>
                        <div class="progress-bar" role="progressbar" style="width: <?php echo($progress)?>%" aria-valuemin="0" aria-valuemax="100"></div>
                        
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
    </div>

</body>

<!--        <div class="list">
                <strong class="place_name">Nom restaurant</strong>
                <p class="place_address">Adresse</p>
                <div class="category">
                    <img class="category_pict" src="medias/logo_category.png">
                    <p class="category_text">Vegan</p>
                </div>
                <div class="token_score">
                    
                </div>
            </div> -->