<?php
/*
Template : affichage de la liste des concerts recherché
parametres : $ liste : liste d'objet concert indexé par l'id
             $region : région recherché
             $type : type de musique recherché
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="padding flex j-between align-center">
        <h1>Concerts recherchés</h1>
        <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Retour Accueil</button></a>
    </div>
    
    <!-- Formulaire de recherche concert : Filtres : Select Type et region -->
    <?php
    include "templates/fragments/form_recherche.php";
    ?>
    <div class="w45 padding mrlauto bgwhite">
    <?php // inclure la liste des concerts
        include "templates/fragments/liste_concert.php";
        if($liste_concert === []){
            echo"<p>Aucun concert ne correspond à votre recherche</p>";
        }
    ?>    
    </div>
</body>
</html>