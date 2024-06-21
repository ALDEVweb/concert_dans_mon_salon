<?php
/*
template : Annonce le bon envoi du message
parametre : aucun
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;afficher_discussion.php?idDiscussion=<?= $idInterlocuteur ?>">
    <title>Message envoyé</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="padding bgwhite mrlauto flex column j-center wfit mt40">
        <h1>Votre message est envoyé</h1>
        <a class="mt16" href="afficher_discussion.php?idDiscussion=<?= $idInterlocuteur ?>"><button class="bgblue smallButton b-none">Retour discussion</button></a>
    </div>
    
</body>
</html>