<?php
include 'bootstrap.php';
include_once 'Config.php';
$idU = $_GET['idU'];
$idR = $_GET['idR'];
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
?>


<!DOCTYPE html>

<html>
    <head>
        <title>PageResto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include_once 'CDN.php'; ?>
        <link href="PageResto.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="row">
            <div class="col-md-5">
                <?php
                $req = $db->prepare("SELECT `Nom` FROM `resto` WHERE idR=$idR");
                $req->execute();
                $nameR = $req->fetch();
                $nomR = $nameR[0];
                ?>
                <br>
                <br>
                <br>
            </div>
        </div>
        <h1><?php echo $nomR ?></h1>
        <?php
        $req2 = $db->prepare("SELECT `labelC` FROM `categories` join `resto` on categories.idC=resto.idC WHERE resto.idR=$idR");
        $req2->execute();
        $cateR = $req2->fetch();
        $labelR = $cateR[0];

        $req3 = $db->prepare("SELECT COUNT(*) FROM avis where idR=$idR");
        $req3->execute();
        $nbtR = $req3->fetch();
        $nbTokkensR = $nbtR[0];
        ?>
        <p><?php echo $labelR ?> - <?php echo $nbTokkensR ?> Token</p>
        <div class="ui horizontal list">
            <div class="item">
                <i class="marker icon"></i>
                <div class="content">
                    <?php
                    $req = $db->prepare("SELECT `Ville` FROM `resto` WHERE idR=$idR");
                    $req->execute();
                    $CityR = $req->fetch();
                    $VilleR = $CityR[0];
                    ?>
                    <?php echo $VilleR ?>
                </div>
            </div>
            <div class="item">
                <i class="phone icon"></i>
                <div class="content">
                    <?php
                    $req = $db->prepare("SELECT `Telephone` FROM `resto` WHERE idR=$idR");
                    $req->execute();
                    $PhR = $req->fetch();
                    $TelR = $PhR[0];
                    ?>

                    <a tel=<?php echo "0" . $TelR ?>>0<?php echo $TelR ?></a>
                </div>
            </div>
            <div class="item">
                <i class="linkify icon"></i>
                <div class="content">
                    <?php
                    $req = $db->prepare("SELECT `Site` FROM `resto` WHERE idR=$idR");
                    $req->execute();
                    $WR = $req->fetch();
                    $SiteR = $WR[0];
                    ?>

                    <a href="<?php echo $SiteR ?>">Le Site Internet</a>
                </div>
            </div>
            <div class="item">
                <div class="content">
                    <?php
                    $sqa = $db->prepare("SELECT COUNT(*) FROM avis where idU=$idU && idR=$idR");
                    $sqa->execute();
                    $tokken = $sqa->fetch();

                    if ($tokken[0] == 0) {
                        ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Tokken +1
                        </button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Vegan
            </div>
            <div class="col-md-1">
                <?php
                $sql2 = $db->prepare("SELECT vegan from resto where idR=$idR");
                $sql2->execute();
                $resultat2 = $sql2->fetch();
                if ($resultat2['vegan'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat2['vegan'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
<!--                <i class="fas fa-check fa-lg" style="color:green;" ></i>-->
            </div>
            <div class="col-md-2">
                Air Conditionné
            </div>
            <div class="col-md-1">
                <?php
                $sql3 = $db->prepare("SELECT air from resto where idR=$idR");
                $sql3->execute();
                $resultat3 = $sql3->fetch();
                if ($resultat3['air'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat3['air'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Parking
            </div>
            <div class="col-md-1">
                <?php
                $sql4 = $db->prepare("SELECT parking from resto where idR=$idR");
                $sql4->execute();
                $resultat4 = $sql4->fetch();
                if ($resultat4['parking'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat4['parking'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Sans Gluten
            </div>
            <div class="col-md-1">
                <?php
                $sql5 = $db->prepare("SELECT gluten from resto where idR=$idR");
                $sql5->execute();
                $resultat5 = $sql5->fetch();
                if ($resultat5['gluten'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat5['gluten'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Accesibilité Handicapé
            </div>
            <div class="col-md-1">
                <?php
                $sql6 = $db->prepare("SELECT handicap from resto where idR=$idR");
                $sql6->execute();
                $resultat6 = $sql6->fetch();
                if ($resultat6['handicap'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat6['handicap'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Plats BIO
            </div>
            <div class="col-md-1">
                <?php
                $sql7 = $db->prepare("SELECT bio from resto where idR=$idR");
                $sql7->execute();
                $resultat7 = $sql7->fetch();
                if ($resultat7['bio'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat7['bio'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Terrasse
            </div>
            <div class="col-md-1">
                <?php
                $sql8 = $db->prepare("SELECT terrasse from resto where idR=$idR");
                $sql8->execute();
                $resultat8 = $sql8->fetch();
                if ($resultat8['terrasse'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat8['terrasse'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Menu enfants
            </div>
            <div class="col-md-1">
                <?php
                $sql9 = $db->prepare("SELECT enfant from resto where idR=$idR");
                $sql9->execute();
                $resultat9 = $sql9->fetch();
                if ($resultat9['enfant'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat9['enfant'] == '0') {
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>
        <br>
        <?php
        $sqb = $db->prepare("SELECT `Adresse`, `Code_Postal`, `Ville` FROM `resto` WHERE idR=$idR");
        $sqb->execute();
        $result = $sqb->fetchAll();
        $address = $result[0]['Adresse'] . " " . $result[0]['Code_Postal'] . " " . $result[0]['Ville'];

        echo '<iframe width="100%" height="170" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
        ?>

        <h1>Commentaires</h1>
        <br>

        <?php
        $nombreA = "SELECT COUNT(*) AS nb FROM Avis where idR=$idR";
        $fromage = $db->query($nombreA);
        $columns = $fromage->fetch();
        $nb = $columns['nb'];
        for ($i = 0; $i < $nb; $i++) {
            $sql = $db->prepare("SELECT * FROM `avis` join `user` on user.idUser=avis.idU WHERE idR=$idR");
            $sql->execute();
            $comment = $sql->fetchAll();
            $nomU = $comment[$i]['FirstName'] . " " . $comment[$i]['LastName'];
            if ($comment[$i]['Avis'] != "") {
                ?>
                <div class="container">
                    <?php
                    echo "<div class='NomComm'> $nomU</div>" ;
                    echo '<br>';
                    echo $comment[$i]['Avis'];
                    echo'<br>';
                    ?>
                </div>
                <?php
            }
        }
        ?>

        <!--------------------------------------Popup---------------------------------------------------------------------------->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un commentaire (facultatif)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="CreationPost.php?idU=<?php echo $idU ?>&idR=<?php echo $idR ?>" method="post">

                            <div id="objet" class="form-group">

                                <label for="Commentaire">Commentaire</label>

                                <input type="text" class="form-control" name="Commentaire">
                                <!-- <div class="form-group">
                                                      <label for="inputdefault">Nom</label>
                                                      <input type='text' name='Nom' required placeholder="Votre nom d'utilisateur">-->
                            </div>
                            <div id="boutonform">
                                <input class="btn btn-outline-secondary" type="submit" value="Envoyer">
                            </div>

                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>