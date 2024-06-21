<?php 

/* code d'initialisation à insérer en début de chaque contrôleur */

// gestion et affichage des erreurs
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs

// ouverture de la base de donnée
global $bdd;
$bdd = new PDO("mysql:host=localhost;dbname=projets_concert_alaugier;charset=UTF8", "alaugier", "9FPp96F9l?T");

// propriété de debug
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// chargement des librairies
include "utils/model.php";
include "modeles/utilisateur.php";
include "utils/session.php";
include "modeles/zone_geo.php";
include "modeles/type_musique.php";
include "modeles/message.php";
include "modeles/concert.php";
include "modeles/concert_organise.php";

// activation du mécanisme de session
session_activation();



