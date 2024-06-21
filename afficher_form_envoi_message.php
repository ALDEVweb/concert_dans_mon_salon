<?php
/*
controleur : recupère id util et interlocuteurdemande l'affichage du form d'envoi de msg
parametres : $_session[id] : id de l'utilisateur
             $_GET[interlocuteur] : id de l'interlocuteur
*/

// initialisation
require_once "utils/init.php";
include "utils/verif_connexion.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
$idInterlocuteur = isset($_GET["idInterlocuteur"]) ? $_GET["idInterlocuteur"] : 0;


// traitement
$interlocuteur = new utilisateur();
$interlocuteur->load($idInterlocuteur);

// affichage
include "templates/pages/form_envoi_message.php";
