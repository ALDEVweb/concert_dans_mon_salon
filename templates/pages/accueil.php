<?php

/* 
Templates : Affiche l'écran d'accueil avec liste article - liste concert - créer concert - rechercher un concert et se connecter (si utilisateur non connecté) si utilisateur connecté ajoute (messagerie - mes concert) et remplace se connecter par modifier compte
Paramètres :    $id : si utilisateur connecté
                $artistes : tableau d'objet artiste indexé par l'id
                $concert : tableau d'objet concerts indexé par l'id
                $type : liste des types de musique
                $region : liste des regions
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header / si connecté affiche messagerie - mes concerts - créer concerts à gauche et modifier compte à droite / si non connecté affiche créer concert à gauche et créer compte à droite -->   
    <header class="flex j-between">
            <?php 
                // si utilisateur connecté
                if ( $id_user !== 0){
                    $nom = $user->get("nom");
                    // inclure le fragment header_connecte
                    include "templates/fragments/header_connecte.php";
                } else { //sinon
                    // inclure  le fragment header_public
                    include "templates/fragments/header_public.php";
                }  
            ?>
    </header>
    <main>
        <!-- popup -->
        <div class="d-none wfit mrlauto padding mt40 flex bgwhite align-center gap50" id="popup">
            <a href="afficher_messagerie.php"><h3 id="msgPopup">Nouveau message !</h3></a>
            <button class="bgblue smallPadding b-none" id="cross">×</button>
        </div> 
        <!-- Formulaire de recherche concert : Filtres : Select Type et region -->
        <?php
        include "templates/fragments/form_recherche.php";
        ?>
        <!-- div container avec div gauche = liste artiste et div droite = div concerts -->
        <div class="container flex w80 mrlauto j-between mt40 align-top">
            <div class="artistes w45 padding bgwhite">
                <h2 class="txt-center">Liste des artistes</h2>
                <?php 
                    // inclure la liste des artiste
                    include "templates/fragments/liste_artiste.php"; 
                ?>
            </div>
            <div class="concerts w45 padding bgwhite">
                <h2 class="txt-center">Liste des concerts</h2>
                <?php 
                    // inclure la liste des concert
                    include "templates/fragments/liste_concert.php"; 
                ?>
            </div>
        </div> 
    </main>
    <script src="js/ajax.js" defer></script>
</body>
</html>