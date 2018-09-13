<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="page_oubli_mot_de_passe.css" rel="stylesheet" type="text/css"/>
        <?php include_once 'CDN.php'; ?>
        <title>Stage</title>
    </head>
    <body>
        <div id="fond_ecran" class="fond_ecran"/></div>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <form method="POST" action='oubli_mot_de_passe_back.php'>
                    <input type="email" class="fadeIn third" name="email" id="email" aria-describedby="emailHelp" placeholder="Adresse Mail">
                    <input type="submit" class="fadeIn fourth" value="Réinitialiser">
                </form>
            </div>
        </div>
    </body>
</html>