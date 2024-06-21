<?php

/* Gestion de la classe utilisateur */

    class utilisateur extends _model {
        // Attributs :
    // Description du modèle de l'objet (de la table)

    protected $table = "utilisateur";       // Nom de la table, à valoriser pour les classes réelles;
    protected $fields = ["nom", "mdp", "mail", "organisateur", "ville", "desc_lieu", "artiste", "pres_artiste", "desc_musique"];      // Liste des noms des champs, avec le type de champ
    // [ "nomChamp1" => typeChamp1, etc...]
    // Types de champs gérés : "NUM", "TXT", "LINK"
        
    function connexion($log, $pwd){
        // role : recherche dans la base de donnée un utilisateur correspondant aux critere de recherche
        // parametre : $log = mail de l'utilisateur
                    // $pwd = pwd de l'utilisateur
        // retour : l'id de l'utilisateur

        // construction
        $sql = "SELECT `id` FROM `utilisateur` WHERE `mail` = :mail AND `mdp` = :pwd";
        $param = [":mail" => $log, ":pwd" => $pwd];

        // préparation
        global $bdd;
        $req = $bdd->prepare($sql);
        // éxecution
        if(! $req->execute($param)){
            // erreur syntaxe - code de debug
            echo "Echec sql : $sql";
            print_r($param);
            exit;
        }

        // récupération
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        if(isset($result[0])){
            $resultat = $result[0];
            $id = $resultat["id"];
        }else{
            $id = 0 ;
        }
        $this->id = $id;

        // retour
        return $this->id;
    }

    }