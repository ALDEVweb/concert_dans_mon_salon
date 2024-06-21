<?php
/*
controleur : deconnecte l'utilisateur et affiche le mesg deco
parametre : $_session[id]
*/

// initialisation
require_once "utils/init.php";

// traitement
session_deconnect();

// affichage
include "templates/pages/page_deconnexion.php";