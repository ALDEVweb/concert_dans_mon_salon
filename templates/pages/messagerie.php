<?php
/*
template :affiche la liste des discussion de l'utilisateur
parametre : $liste_interlocuteur - liste des interlocuteur de l'utilisateur
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div  class="w100 padding flex j-between">
        <h1>Messagerie</h1><br>
        <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Accueil</button></a>
    </div>
    <div class="mt40 wfit mrlauto bgwhite padding">
    <?php
    foreach($liste_interlocuteur as $id => $nom){
        $nonlu = "";
        $liste_discussion = $message->listeDiscussion($id_user, $id);
        // on interroge chaque message
        foreach($liste_discussion as $idmsg => $msg){
            // s'il est interlocuteur et etat du msg à 0 
            if($msg->get("interlocuteur") == $id_user && $msg->get("etat") == 0){
                // alors on fixe une variable msg non lu  a afficher
                $nonlu = "!!!";
            }
        }
        ?>
        <div class="flex padding gap16 align-center mt16">
            <h2><?= $nom->get("nom") ?> <?= $nonlu ?></h2>
            <a href="afficher_discussion.php?idDiscussion=<?= $id ?>"><button class="bgblue smallPadding b-none">Voir le fil de discussion</button></a>
        </div><br>
        <?php
    }
    ?>
    </div>
</body>
</html>