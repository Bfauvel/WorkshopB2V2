<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="page_de_connection.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<!--        <script type="text/javascript" src="connection.js"></script>-->
        <?php include_once 'CDN.php'; ?>
        <title>Connexion</title>
    </head>
    <body>
        <div id="fond_ecran" class="fond_ecran"/>        
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <img src="image/logonoir.png" id="icon" alt="User Icon" /><br>
                </div>
                <form method="POST" action='connexion_back.php' onsubmit=" return verifForm(this)">
                    <input type="text" id="login" class="fadeIn second" name="mail" placeholder="Adresse Mail">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de Passe">
                    <input type="submit" class="fadeIn fourth" value="S'identifier">
                    <p id="p6">L'utilisateur demandé n'a pu être trouvé.</p>
                </form>
                <div id="formFooter">
                    <a class="underlineHover" href="oubli_mot_de_passe.php">Vous avez oublié votre mot de passe?</a><br>
                    <a class="underlineHover" href="inscriptions.php">Vous n'etes pas inscrit?</a>
                </div>
            </div>
        </div>
    </body>
</html>