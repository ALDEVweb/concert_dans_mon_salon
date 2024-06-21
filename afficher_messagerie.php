<?php
/*
controleur : récupère la liste des message de l'utilisateur et dde l'affichege de la messagerie
parametres : $_session[id] : id de l'utilisateur connecté
*/

// initialisation
require_once "utils/init.php";
include "utils/verif_connexion.php";

// récupération
$id_user = session_isconnected() ? session_idconnected() : 0;
$message = new message();
$liste_message = $message->listePerso($id_user);


// traitement
// j'initialise la liste des interlocuteur
$liste_interlocuteur = [];
// j'interoge chaque message de la liste
foreach($liste_message as $id => $msg){
    // je récupère les auteur et interlocuteur
    $auteur = $msg->get("auteur");
    $interlocuteur = $msg->get("interlocuteur");  
    // si $ auteur est différent de l'id utilisateur
    if($auteur !== $id_user){
        // je récupère le nom
        $nomAuteur = $msg->getTarget("auteur");
        // j'initialise une variable de comparaison
        $compare = 0;
        // je compare le nom aux nom déjà présent dans la liste d'interlocuteur
        foreach($liste_interlocuteur as $id => $nom){
            // si le nom est déjà présent
            if($nom === $nomAuteur){
                // je met compare à 1
                $compare = 1;
            }
        }
        // si $compare = 0
        if($compare === 0){
            // j'ajoute le nom de l'auteur à l'id auteur dans la liste
            $liste_interlocuteur[$auteur] = $nomAuteur;
        }
    }
    // on refait de meme avec interlocuteur, si interlocuteur dif de id_user
    if($interlocuteur !== $id_user){
        // je récupère le nom
        $nomInterlocuteur = $msg->getTarget("interlocuteur");
        // j'initialise une variable de comparaison
        $compare = 0;
        // je compare le nom aux nom déjà présent dans la liste d'interlocuteur
        foreach($liste_interlocuteur as $id => $nom){
            // si le nom est déjà présent
            if($nom === $nomInterlocuteur){
                // je met compare à 1
                $compare = 1;
            }
        }
        // si $compare = 0
        if($compare === 0){
            // j'ajoute le nom de l'interlocuteur à l'id interlocuteur dans la liste
            $liste_interlocuteur[$interlocuteur] = $nomInterlocuteur;
        }
    }
}



// affichage
include "templates/pages/messagerie.php";