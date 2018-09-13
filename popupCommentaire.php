<!DOCTYPE html>

<?php
include 'bootstrap.php';
include_once 'Config.php';
$idU = $_GET['idU'];
$idR = $_GET['idR'];
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Tokken</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $sql = $db->prepare("SELECT COUNT(*) FROM avis where idU=$idU & idR=$idR");
        $sql->execute();
        $result = $sql->fetch();
        if ($result[0] <1) {
            ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tokken +1
            </button>
            <?php
        }
        ?>
       

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