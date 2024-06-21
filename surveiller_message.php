<?php

// fonction permettant la surveillance des message
// parametre : $id_user
// retour : new_msg - true or false

require_once "utils/init.php";

// récupération des parametres
$id_user = session_isconnected() ? session_idconnected() : 0;

// Récupération 
$message = new message($id_user);
$popup = $message->surveilleMsg($id_user);

if (!empty($popup)){
    $idAuteur = $popup["auteur"];
    $auteur = new utilisateur($idAuteur);
    echo json_encode(["auteur" => $auteur->get("nom"), "dateMsg" => $popup["date"]]);
}else{
    echo json_encode(["auteur" => "", "dateMsg" => ""]);
}
