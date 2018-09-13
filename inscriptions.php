<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="page_d'inscription.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="password.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <?php include_once 'CDN.php'; ?>
        <title>Stage</title>
    </head>
    <body>
        <div id="fond_ecran" class="fond_ecran"/>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <form method="POST" action='inscription_back.php' onsubmit="return verifForm(this)">
                    <p id="p5">FORMULAIRE D'INSCRIPTION A WELUNCH</p>
                    <input type="text" id="nom1" class="fadeIn second" name="nom" placeholder="Nom"  onblur="verifPseudo(this)">
                    <p id = "p1">Vous devez rentrer un nom</p>
                     <input type="text" id="nom1" class="fadeIn second" name="prenom" placeholder="Prénom"  onblur="verifPseudo(this)">
                     <p id = "p1">Vous devez rentrer un prénom</p>
                    <input type="text" class="fadeIn third" name='email' placeholder="Adresse Mail" onblur="verifMail(this)">
                    <p id ="p2">L'adresse mail doit être de type exemple@exemple.com</p>
                    <input type="password" id="password1" class="fadeIn third" name="password" onblur="verifPassword(this)" placeholder="Mot de Passe">
                    <p id="p3">Le mot de passe doit comporter au moins 7 caractères et au moins 1 chiffre</p>
                    <input type="password" id="password2" class="fadeIn third" name="password_confirmation" placeholder="Confirmation du Mot de Passe" onBlur="verifConfirmPassword(this)">
                    <p id="p4">Les mot de passe ne corespondent pas</p>
                    <input type="submit" class="fadeIn fourth" value="Créer">
                </form>
            </div>
        </div>
        <script type="text/javascript" src="chercher.js"></script>
    </body>
</html>

