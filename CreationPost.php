<?php
        include_once 'Config.php';
        $idU=$_GET['idU'];
        $idR=$_GET['idR'];
        $avis = $_POST['Commentaire'];
        $db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
        $sql = $db->prepare("INSERT INTO `avis` (`idR`, `idU`, `Avis`) VALUES ('$idR', '$idU', '$avis')");
        $sql->execute();
        
header("location: PageResto.php?idU=$idU&idR=$idR");
?>

