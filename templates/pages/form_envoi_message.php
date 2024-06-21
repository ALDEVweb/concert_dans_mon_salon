<?php
/*
template : affiche le formulaire d'envoi d'un message
parametre : $id_user : id de l'utilisateur
            $interlocuteur : = id de l'interlocuteur
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'envoi d'un message</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="mt16 txt-center">Envoyer un message à <?= $interlocuteur->get("nom") ?></h1>
    <div class="wfit mrlauto mt40">
        <form action="envoyer_message.php?idInterlocuteur=<?= $interlocuteur->id() ?>" method="POST">
            <textarea name="contenu" id="contenu" cols="60" rows="10"></textarea><br>
            <div class="wfit mrlauto mt16">
                <input class="bgwhite smallPadding b-none" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
    <div class="wfit mrlauto mt16">
        <a href="afficher_messagerie.php"><button class="bgwhite smallPadding b-none">Annuler</button></a>
    </div>
</body>
</html>