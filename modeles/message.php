<?php

/* Gestion de la classe utilisateur */

    class message extends _model {
        // Attributs :
        // Description du modèle de l'objet (de la table)

        protected $table = "message";       // Nom de la table, à valoriser pour les classes réelles;
        protected $fields = ["etat", "contenu", "auteur", "interlocuteur", "date"];      // Liste des noms des champs, avec le type de champ
        // [ "nomChamp1" => typeChamp1, etc...]
        // Types de champs gérés : "NUM", "TXT", "LINK"
        protected $links = ["auteur" => "utilisateur", "interlocuteur" => "utilisateur"];      // Liste des liens sortants : 
            //tableau qui pour cahque lien met en index le nom du champ qui est un lien, et en valeur le nom de l'objet
            //  (exemple : [ "fournisseur" => "fournisseur"])
            

        function listePerso($id){
            // role : récupère tout les message lié à l'id (interlocuteur ou auteur)
            // parametres : $id - id de l'utilisateur connecté
            // retour : $liste - tableau d'objet message indexé par l'id

            // construction
            $sql = "SELECT `id`, `etat`, `auteur`, `interlocuteur`, `contenu`, `date` FROM `message` WHERE `auteur` = :id OR `interlocuteur` = :id ORDER BY `date` DESC";
            $param = [":id" => $id];

            // preparation
            global $bdd;
            $req = $bdd->prepare($sql);

            // execution
            if(! $req->execute($param)){
                // erreur syntaxe - code debug
                echo "Echec sql  $sql";
                print_r($param);
                return [];
            }

            // récupération
            $liste = [];
            // temps que j'ai un élément dans résultat
            while($message = $req->fetch(PDO::FETCH_ASSOC)){
                //j'instancie un nouvel objet
                $msg = new message();
                // on le charge
                $msg->loadFromTab($message);
                // on l'ajoute au tableau
                $liste[$msg->id()] = $msg;
            }

            // retour
            return $liste;
        }

        function listeDiscussion($user, $interlocuteur){
            // role : récupère tout les message lié à l'id (interlocuteur ou auteur)
            // parametres : $id - id de l'utilisateur connecté
            // retour : $liste - tableau d'objet message indexé par l'id

            // construction
            $sql = "SELECT `id`, `etat`, `auteur`, `interlocuteur`, `contenu`, `date` FROM `message` WHERE `auteur` = :user AND `interlocuteur` = :interlocuteur OR `auteur` = :interlocuteur  AND `interlocuteur` = :user ORDER BY `date` DESC";
            $param = [":user" => $user, ":interlocuteur" => $interlocuteur];

            // preparation
            global $bdd;
            $req = $bdd->prepare($sql);

            // execution
            if(! $req->execute($param)){
                // erreur syntaxe - code debug
                echo "Echec sql  $sql";
                print_r($param);
                return [];
            }

            // récupération
            $liste = [];
            // temps que j'ai un élément dans résultat
            while($message = $req->fetch(PDO::FETCH_ASSOC)){
                //j'instancie un nouvel objet
                $msg = new message();
                // on le charge
                $msg->loadFromTab($message);
                // on l'ajoute au tableau
                $liste[$msg->id()] = $msg;
            }

            // retour
            return $liste;
        }

        function listInterlocuteur($id, $idInterlocuteur){
        }



        function msglu(){
            // role : modifie l'etat du message dans la base de donne pour le mettre lu
            // parametre : $id - id du msg a modifier
            // retour : true / false

            //construction
            $sql = "UPDATE `message` SET `etat` = 1 WHERE `id` = :id";
            $param = [":id" => $this->id];

            // preparation
            global $bdd;
            $req = $bdd->prepare($sql);

            // execution
            if(!$req->execute($param)){
                // erreur syntaxe - code debug
                echo "Echec sql  $sql";
                print_r($param);
                return false;
            }

            // retour
            return true;
        }

        function lastMsgId(){
            // role : récupère le dernier id de la table
            // parametre : aucun
            // retour : $id - le dernier id de la table

            // construction
            $sql = "SELECT `id`, `interlocuteur` FROM `message` ORDER BY `id` DESC LIMIT 1";
            
            // préparation
            global $bdd;
            $req = $bdd->prepare($sql);

            // Exécution
            if(!$req->execute()){
                // erreur de syntaxe - code de debug
                echo "Echec sql : $sql";
                return 0;
            }

            // récupération
            $id = $req->fetchAll(PDO::FETCH_ASSOC);

            // retour
            return $id[0];
        }

        function surveilleMsg($id_user){
        // fonction permettant la surveillance des message
        // parametre : $id_user
        // retour : tableau [interlocuteur => id, date => valeur date]

            // construction
            $sql = "SELECT `auteur`, `date` FROM `message` WHERE `etat` = 0 AND `interlocuteur` = :user ORDER BY `date` DESC";
            $param = [":user" => $id_user];

            // préparation
            global $bdd;
            $req = $bdd->prepare($sql);

            // execution
            if(!$req->execute($param)){
                // erreur syntaxe - code debug
                echo "echec sql : $sql";
                print_r($param);
                return [];
            }

            // récupération
            $result = $req->fetchAll(PDO::FETCH_ASSOC);

            // retour
            return $result[0];
        }
    }