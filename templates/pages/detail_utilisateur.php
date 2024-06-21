<?php

/* 
Templates : affiche le détail d'un utilisateur et la liste de ses cncerts lorsque c'est un artiste
parametres : $id
             $liste = liste des concerts
             $liste_zone = liste des zone_geo
             $liste_type = liste des type_musique
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex j-between align-center padding">
        <div class="flex">
            <h1 class="mr16"><?= $user->get("nom") ?></h1>
            <a href="afficher_form_envoi_message.php?idInterlocuteur=<?= $user->id() ?>"><button class="bgwhite smallPadding b-none">Contacter</button></a>
        </div>
        <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Retour Accueil</button></a>
    </div>
    
    <ul class="bgwhite wfit padding mrlauto mt40">
        <?php 
            if($disc === true && $user->get("organisateur") === '1'){
                ?>
                <div class="flex gap50">
                    <li class="w350p"><b>Ville : </b><?= $user->get("ville") ?> </li>
                    <li class="w350p"><b>Description du lieu : </b><?= $user->get("desc_lieu") ?> </li>
                </div>
                <?php
            }
            if($user->get("artiste") === "1"){
                ?>
                <div class="flex gap50">
                    <li class="w350p"><b>Présentation : </b><?= $user->get("pres_artiste") ?> </li>
                    <li class="w350p"><b>Description de la musique : </b><?= $user->get("desc_musique") ?> </li>
                </div>
                <?php
            }
        ?>
    </ul>
    <?php 
        if($user->get("artiste") === "1"){
            ?>
            <h2 class="padding mt40">Liste de ses concerts :</h2>
            <div class="flex w80 mrlauto gap50 mt16">
                <?php
                include "templates/fragments/concerts_artiste.php";
                ?>
            </div>
            <?php
        }
    ?>
</body>
</html>