<?php
/*
controleur : récupère et affiche la liste des concerts créé par l'utilisateur
parametre : $_session[id]
*/

// initialisation
require_once "utils/init.php";


// récupération
if (session_isconnected()){
    $id_user = session_idconnected();
}else{
    $id_user = 0;
}

// traitement
$listeConcert = new concert();
$mesConcerts = $listeConcert->listId($id_user);

// affichage
include "templates/pages/mes_concerts.php";
