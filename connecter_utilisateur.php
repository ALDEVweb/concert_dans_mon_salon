<?php
/*
controleur : vérifie que les log et pwd existe dans la bdd et connecte l'utilisateur ou l'informe de l'echec
parametre : $post[log] $post[pwd] info de connexion de l'utilisateur
*/

// initialisation
require_once "utils/init.php";

// récupération
if(!empty($_GET["log"])){
    $log = $_GET["log"];
}else{
    $log = 0;
}
$pwd = !empty($_GET["pwd"]) ? $_GET["pwd"] : 0;

if($log === 0 || $pwd === 0){
    include "templates/pages/page_connexion_echec.php";
    exit;
}
// traitement
// recherche utilisateur dans la base de  donnée
$user = new utilisateur();
$userConnect = $user->connexion($log, $pwd);

// affichage
// si il existe je le connecte et redirege vers l'accueil
// sinon j'affiche la page de connexion avec le msg d'erreur

if($userConnect === 0){
    include "templates/pages/page_connexion_echec.php";
    exit;
}else{
    $utilisateur = new utilisateur($userConnect);
    $nom = $utilisateur->get("nom");
    session_connect($userConnect);
    include "templates/pages/page_connexion_success.php";
}