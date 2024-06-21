<?php
/*
controleur : récupère l'id de l'utilisateur et l'id de l'interlocuteur pour demandé l'affichage des message de mla discussion entre les 2
parametre : $_get[iddiscussion] - id de l'interlocuteur
*/

// initialisation
require_once "utils/init.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
$idDiscussion = isset($_GET["idDiscussion"]) ? $_GET["idDiscussion"] : 0;
$interlocuteur = new utilisateur($idDiscussion);
$message = new message();
$liste_message = $message->listeDiscussion($id_user, $idDiscussion);

// Traitement


// Affichage
include "templates/pages/discussion.php";