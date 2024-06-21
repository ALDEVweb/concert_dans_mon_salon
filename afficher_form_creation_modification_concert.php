<?php
/*
controleur : vérifie si l'utilisateur est connecté avant de demander l'affichage du formulaire de création modification d'un concert
parametre : $_session[id] : si utilisateur connecté
            $_GET[idConcert] : si concert à modifier
*/

// initialisation
require_once "utils/init.php";
include "utils/verif_connexion.php";


// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
if(isset($_GET["idConcert"])){
    $idConcert = $_GET["idConcert"];
    // traitement
    $concert = new concert($idConcert);
}else{
    $idConcert = 0;
}

// récupération de la liste des types de musique
$type = new type_musique();
$liste_type = $type->listAll();
// récupération de la liste des régoions
$zone_geo = new zone_geo();
$liste_zone = $zone_geo->listAll();

// affichage
include "templates/pages/form_creation_modification_concert.php";