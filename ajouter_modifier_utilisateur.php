<?php
/*
controleur : Ajoute un utilisateur dans la base de données, récupère son id et ouvre sa session
parametres : $_POST[] : données de l'utilisateur à créer
*/

// initialisation
require_once "utils/init.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
$orga = isset($_POST["organisateur"]) ? 1 : 0;
$ville = isset($_POST["ville"]) ? $_POST["ville"] : "";
$lieu = isset($_POST["desc_lieu"]) ? $_POST["desc_lieu"] : "";
$artiste = isset($_POST["artiste"]) ? 1 : 0;
$pres = isset($_POST["pres_artiste"]) ? $_POST["pres_artiste"] : "";
$musique = isset($_POST["desc_musique"]) ? $_POST["desc_musique"] : "";

// traitement
// si un utilisateur est connecté, nous devons modifier son compte, dc on charge un nouvel objet avec les infos existante puis on les modifie
// sinon on charge un nouvel objet vide car c'est un nouveau compte 
if($id_user !== 0){
    $utilisateur = new utilisateur($id_user);
}else{
    $utilisateur = new utilisateur();
}
// on charge les nouvelle valeur
$utilisateur->set("nom", $nom);
$utilisateur->set("mail", $mail);
$utilisateur->set("mdp", $mdp);
$utilisateur->set("organisateur", $orga);
$utilisateur->set("ville", $ville);
$utilisateur->set("desc_lieu", $lieu);
$utilisateur->set("artiste", $artiste);
$utilisateur->set("pres_artiste", $pres);
$utilisateur->set("desc_musique", $musique);

// si utilisateur connecté je dde modif, sinon je crée
if($id_user !== 0){
    $utilisateur->update();
    // affichage
    include "templates/pages/utilisateur_modifiee.php";
}else{
    $utilisateur->insert();
    session_connect($utilisateur->id());
    // affichage
    include "templates/pages/utilisateur_cree.php";
}
