<?php
/*
template : Annonce que la modifications est bien prise en compte
parametre : $id_user : id de l'utilisateur
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;afficher_accueil.php">
    <title>Utilisateur modifié</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="padding bgwhite mrlauto flex column j-center wfit mt40">
        <h1><?= $utilisateur->get("nom") ?>, la modification de votre compte est bien prise en compte.</h1>
        <a class="mt16" href="afficher_accueil.php"><button class="bgblue smallPadding b-none">Retour à l'accueil</button></a>
    </div>
    
</body>
</html>