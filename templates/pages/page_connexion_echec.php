<?php
/*
template : Affiche la page de connexion avec formulaire id-pwd + btn création + info echec connexion
parametres : aucun
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="padding bgwhite mrlauto flex column j-center wfit mt40">
        <h1>Connexion</h1>
        <form action="connecter_utilisateur.php" method="GET" class="flex column">
            <label class="mt40">Mail : <input type="text" name="log" id="log"></label>
            <label class="mt16">Password : <input type="text" name="pwd" id="pwd"></label>
            <input type="submit" value="Connexion" class="bgblue smallPadding b-none mt16">
        </form>
        <p class="mt16 red">Vous avez saisi un login ou un password erroné, veuillez réessayer.</p>
        <p class="mt40">-----------------------------------------</p>
        <a class="mt40" href="afficher_form_creation_modification_utilisateur.php"><button class="bgblue smallPadding b-none">Créer un compte</button></a>
    </div>
</body>
</html>