<?php 

/* 
Controleur : vérifie si l'utilisateur est connecté avant de demander l'affichage de l'écran d'accueil
parametres : $_SESSION[id] = id de l'utilisateur connecté
*/

// initialisation
require_once "utils/init.php";

// récupération des données
// si il y a un id on l'enregistre dans $id - sinon on met 0 sur $id

$id_user = session_isconnected() ? session_idconnected() : 0;

if($id_user !== 0){
    $user = new utilisateur($id_user);
}

// récupération de la liste des régions
$zone_geo = new zone_geo();
$liste_zone = $zone_geo->listAll();
// récupération de la liste des types de musique=
$type = new type_musique();
$liste_type = $type->listAll();
// récupération de la liste des artiste
$utilisateur = new utilisateur();
$liste_user = $utilisateur->listAll();
// récupération de la liste des concerts
$concert = new concert();
$liste_concert = $concert->listAll();

// récupération de la liste des message de l'utilisateur
$message = new message();
$liste_message = $message->listePerso($id_user);
$nonlu = "";
// on interroge chaque message
foreach($liste_message as $id => $msg){
    // s'il est interlocuteur et etat du msg à 0 
    if($msg->get("interlocuteur") == $id_user && $msg->get("etat") == 0){
        // alors on fixe une variable msg non lu  a afficher
        $nonlu = "!!!";
    }
}



// traitement
    // aucun

// appel du template
require "templates/pages/accueil.php";