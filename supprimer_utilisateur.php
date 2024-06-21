<?php
/*
controleur : Supprime un utilisateur dans la base de données
parametres : $_session[id] : id de l'utilisateur à supprimer
*/

// initialisation
require_once "utils/init.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;

// traitement
$utilisateur = new utilisateur($id_user);
$utilisateur->delete();
session_deconnect();

// affichage
include "templates/pages/utilisateur_supprimee.php";