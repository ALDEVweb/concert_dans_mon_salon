<?php
/*
template : affiche la liste des message de l'utilisateur avec un interlocuteur spécifique
parametre : $liste - liste des message avec un meme interlocuteur
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex j-between align-center padding">
        <div class="flex gap16">
            <h1>Discussion avec <?= $interlocuteur->get("nom") ?></h1><br>
            <a href="afficher_form_envoi_message.php?idInterlocuteur=<?= $interlocuteur->id() ?>"><button class="bgwhite smallPadding b-none">Ecrire un nouveau message</button></a>
        </div>
        <div class="flex gap16">
            <a href="afficher_messagerie.php"><button class="bgwhite smallPadding b-none">Messagerie</button></a>
            <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Accueil</button></a>
        </div>
    </div>
    
    <div class="wfit mrlauto mt40">
        <?php
        $nomInterloc = $interlocuteur->get("nom");
        foreach($liste_message as $id => $msg){
            if($msg->get("interlocuteur") === $id_user){
                $idInt = $interlocuteur->id();
                $rep = "<a class'mt16' href='afficher_form_envoi_message.php?idInterlocuteur=$idInt'><button class='bgblue smallPadding b-none'>Répondre</button></a>";
                if($msg->get("etat") == 0){
                    $etat = "Non lu";
                }else{
                    $etat = "lu";
                }
            }else{
                $idInt = $interlocuteur->id();
                $rep = "";
                if($msg->get("etat") == 0){
                    $etat = "Non lu par $nomInterloc";
                }else{
                    $etat = "lu par $nomInterloc";
                }
            }
            ?>
            <div class="bgwhite flex gap16 padding mt16">
                <div class="padding w200p">
                    <p class="mt16"><?= $msg->get("date") ?></p>
                    <p class="mt16"><?= $etat ?></p>
                </div>
                <div class="w350p padding">
                    <p><?= $msg->get("contenu") ?></p>
                </div>
                <p><?= $rep ?></p>             
            </div>
            <?php
            if($msg->get("interlocuteur") === $id_user && $msg->get("etat") == 0){
                $msg->msglu();
            }
        }
        ?>
    </div>
</body>
</html>