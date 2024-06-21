<?php
/*
controleur : Supprime un concert dans la base de données
parametres : $_session[id] : id de l'utilisateur à supprimer
*/

// initialisation
require_once "utils/init.php";
if (session_isconnected()){
    $id_user = session_idconnected();
}else{
    $id_user = 0;
}

// récupération
$idConcert = isset($_GET["idConcert"]) ? $_GET["idConcert"] : 0;

// traitement
$concert = new concert($idConcert);
$concert->delete();

// affichage
include "templates/pages/concert_supprimee.php";