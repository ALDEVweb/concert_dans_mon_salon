<?php
/*
controleur : vérifie si l'utilisateur est connecté avant de demander l'affichage du formulaire de création modification
parametre : $_session[id] : si utilisateur connecté
*/

// initialisation
require_once "utils/init.php";


// récupération
if (session_isconnected()){
    $id_user = session_idconnected();
    $user = new utilisateur($id_user);
}else{
    $id_user = 0;
}

// traitement


// affichage
include "templates/pages/form_creation_modification_utilisateur.php";