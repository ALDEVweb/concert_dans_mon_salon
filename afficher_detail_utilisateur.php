<?php
/*
Controleur : récupère les infos des artistes et leur concerts pour en demander l'affichage
parametres : 
    $_GET[id] : id de l'utilisateur à afficher
    $_GET[disc] : info si lien depuis une discussion ou non
*/

// initialisation
require_once "utils/init.php";

// si il y a un id on l'enregistre dans $id - sinon on met 0 sur $id
if (session_isconnected()){
    $id_user = session_idconnected();
}else{
    $id_user = 0;
}

// récupération des données
if(isset($_GET["id"])){
    $id_artiste = $_GET["id"];
}else{
    $id_artiste = 0;
    echo "l'id ne correspond pas à un artiste valide";
}
if(isset($_GET["disc"])){
    $disc = $_GET["disc"];
}else{
    $disc = false;
}


// traitements 
$user = new utilisateur($id_artiste);
$concert = new concert();
$liste_concert = $concert->listAll();

// affichage
require "templates/pages/detail_utilisateur.php";