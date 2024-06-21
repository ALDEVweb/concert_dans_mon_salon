<?php

/* Gestion de la classe utilisateur */

    class concert extends _model {
        // Attributs :
    // Description du modèle de l'objet (de la table)

    protected $table = "concert";       // Nom de la table, à valoriser pour les classes réelles;
    protected $fields = ["artiste", "prix", "type_lieu", "duree", "zone_geo", "type_musique"];      // Liste des noms des champs, avec le type de champ
    // [ "nomChamp1" => typeChamp1, etc...]
    // Types de champs gérés : "NUM", "TXT", "LINK"
    protected $links = ["artiste" => "utilisateur", "zone_geo" => "zone_geo", "type_musique" => "type_musique"];      // Liste des liens sortants : 
        //tableau qui pour cahque lien met en index le nom du champ qui est un lien, et en valeur le nom de l'objet
        //  (exemple : [ "fournisseur" => "fournisseur"])
        
    
    function recherche($type_musique = NULL, $region = NULL){
        // role : récupère la liste de tout les concerts remplissant les conditions demandé
        // paramètre : 
            // $type = valeur à mettre dans WHERE
            // $region = valeur à mettre dans WHERE

        $sql = "SELECT "; 
        // Construire la liste des champs encadrés par ` 
        $tableau = ["`id`"];
        foreach($this->fields as $nomChamp) {
            $tableau[] = "`$nomChamp`";
        }
        $sql .= implode(", ", $tableau) . " FROM `$this->table`";

        $filtres = [];
        if( !is_null($type_musique)){
            $filtres[] = "`type_musique` = $type_musique";
        }
        if(!is_null($region) ){
            $filtres[] = "`zone_geo` = $region";
        }
        if(!empty($filtres)){
            $sql.= " WHERE " . implode(" AND ", $filtres);
        }

        // préparer / exécuter
        global $bdd;
        $req = $bdd->prepare($sql);
        if ( ! $req->execute()) {
            // Echec de la requête
            echo "Echec sql : $sql";
            return [];
        }

        // Construire le tableau résultat
        $result = [];
        // tant que j'ai une ligne de résultat de la requête à lire
        while ($tabObject = $req->fetch(PDO::FETCH_ASSOC)) {
            // "transférer" $tabObject en objet de la classe courante
            // Récupération du nom de la classe de l'objet courant
            $classe = get_class($this);
            $obj = new $classe();
            // Charger l'objet
            $obj->loadFromtab($tabObject);
            // ON ajoute cela dans $result
            $result[$obj->id()] = $obj;
        }

        return $result;
    }
    
    function listId($id){
        // role : liste les concerts créé par un id
        // parametre : $id = id de l'utilisateur
        // retour : $result = tableau d'objet concert indéxé par l'id

        // construction
        $sql = "SELECT `id`, `artiste`, `prix`, `type_lieu`, `duree`, `zone_geo`, `type_musique` FROM `$this->table` WHERE `artiste` = :id";
        $param = [":id" => $id];

        // préparation
        global $bdd;
        $req = $bdd->prepare($sql);

        // execution
        if(! $req->execute($param)){
            // erreur de syntaxe - code de debug
            echo "echec sql :  $sql";
            print_r($param);
        }

        // récupération
        $result = [];
        // tant que j'ai une ligne de résultat de la requête à lire
        while ($tabObject = $req->fetch(PDO::FETCH_ASSOC)) {
            // "transférer" $tabObject en objet de la classe courante
            // Récupération du nom de la classe de l'objet courant
            $obj = new concert();
            // Charger l'objet
            $obj->loadFromtab($tabObject);
            // ON ajoute cela dans $result
            $result[$obj->id()] = $obj;
        }

        //retour
        return $result;
    }

    }