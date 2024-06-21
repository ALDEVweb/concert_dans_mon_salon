<?php

/*
controleur : récupère liste des concert remplissant les critère  et dde son affichage
parametre : $_POST[type, region] : critere de filtration pour chercher la liste des concert correspondants
*/

// initialisation
require_once "utils/init.php";

// si il y a un id on l'enregistre dans $id - sinon on met 0 sur $id
if (session_isconnected()){
    $id_user = session_idconnected();
}else{
    $id_user = 0;
}


// recupération
if(!empty($_GET["type"])){
    $type_musique = $_GET["type"];
}else{
    $type_musique = NULL;
}
if(!empty($_GET["region"])){
    $region = $_GET["region"];
}else{
    $region = NULL;
}

// récupération de la liste des régions
$zone_geo = new zone_geo();
$liste_zone = $zone_geo->listAll();
// récupération de la liste des types de musique=
$type = new type_musique();
$liste_type = $type->listAll();

// traitement 
$concert = new concert();
$liste_concert = $concert->recherche($type_musique, $region);
$musique = new type_musique($type_musique);
$zone = new zone_geo($region);

// affichage
require "templates/pages/recherche.php";