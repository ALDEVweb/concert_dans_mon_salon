<?php
/*
controleur : Enregistre le message dans la base de donnée
parametres : $_session[id] : id de l'utilisateur
             $_GET[idInterlocuteur] : id de l'interlocuteur de la discussion
             $_POST[contenu] : données du message à envoyer
*/

// initialisation
require_once "utils/init.php";

//recuperation
$id_user = session_isconnected() ? session_idconnected() : 0;
$idInterlocuteur = isset($_GET["idInterlocuteur"]) ? $_GET["idInterlocuteur"] : 0;
$contenu = isset($_POST["contenu"]) ? $_POST["contenu"] : "";

// traitement
$message = new message();
$message->set("auteur", $id_user);
$message->set("interlocuteur", $idInterlocuteur);
$message->set("contenu", $contenu);
$date = date("Y-m-d H:i:s");
$message->set("date", $date);
$message->set("etat", 0);

$message->insert();

// affichage
include "templates/pages/message_envoye.php";