<?php
    session_start();
  //if ($_SESSION['id_utilisateurs']) { 
 
        $_SESSION = array();
        session_destroy();
        setcookie('mail', '');
        setcookie('password', '');
       // header('Location: page_accueil.php?deco=1');
    //}
    //else {
        header('Location: connexion.php');
   // }
?>