<?php
/*
controleur : Ajoute un concert dans la base de données
parametres : $_POST[] : données de l'utilisateur à créer
*/

// initialisation
require_once "utils/init.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
$idConcert = isset($_GET["idConcert"]) ? $_GET["idConcert"] : 0;
$prix = isset($_POST["prix"]) ? $_POST["prix"] : "";
$duree = isset($_POST["duree"]) ? $_POST["duree"] : "";
$musique = isset($_POST["type"]) ? $_POST["type"] : "";
$region = isset($_POST["region"]) ? $_POST["region"] : "";
$lieu = isset($_POST["type_lieu"]) ? $_POST["type_lieu"] : "";



// traitement
// si un utilisateur est connecté, nous devons modifier son compte, dc on charge un nouvel objet avec les infos existante puis on les modifie
// sinon on charge un nouvel objet vide car c'est un nouveau compte 
if($idConcert !== 0){
    $concert = new concert($idConcert);
}else{
    $concert = new concert();
}
// on charge les nouvelle valeur
$concert->set("artiste", $id_user);
$concert->set("prix", $prix);
$concert->set("duree", $duree);
$concert->set("type_musique", $musique);
$concert->set("zone_geo", $region);
$concert->set("type_lieu", $lieu);

// si utilisateur connecté je dde modif, sinon je crée
if($idConcert != 0){
    $concert->update();
    // affichage
    include "templates/pages/concert_modifiee.php";
}else{
    $concert->insert();
    // affichage
    include "templates/pages/concert_cree.php";
}
