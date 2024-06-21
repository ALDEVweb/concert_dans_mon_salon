<?php
/*
template : affiche mla liste des concerts d'un artiste
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mes concerts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex j-between padding align-center">
        <h1>Mes concerts</h1>
        <div>
            <a class="mr16" href="afficher_form_creation_modification_concert.php"><button class="bgwhite smallPadding b-none">Créer un concert</button></a>
            <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Retour à l'accueil</button></a>
        </div>
    </div>
    
    <?php
    include "templates/fragments/liste_mes_concerts.php";
    ?>
    
</body>
</html>
