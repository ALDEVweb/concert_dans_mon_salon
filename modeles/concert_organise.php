<?php

/* Gestion de la classe utilisateur */

    class concert_organise extends _model {
        // Attributs :
    // Description du modèle de l'objet (de la table)

    protected $table = "concert_organise";       // Nom de la table, à valoriser pour les classes réelles;
    protected $fields = ["organisateur", "date", "concert"];      // Liste des noms des champs, avec le type de champ
    // [ "nomChamp1" => typeChamp1, etc...]
    // Types de champs gérés : "NUM", "TXT", "LINK"
    protected $links = ["organisateur" => "utilisateur", "concert" => "concert"];      
    // Liste des liens sortants : 
        //tableau qui pour cahque lien met en index le nom du champ qui est un lien, et en valeur le nom de l'objet
        //  (exemple : [ "fournisseur" => "fournisseur"])
        
    }