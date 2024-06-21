<?php

/* Gestion de la classe utilisateur */

    class type_musique extends _model {
        // Attributs :
    // Description du modèle de l'objet (de la table)

    protected $table = "type_musique";       // Nom de la table, à valoriser pour les classes réelles;
    protected $fields = ["type"];      // Liste des noms des champs, avec le type de champ
    // [ "nomChamp1" => typeChamp1, etc...]
    // Types de champs gérés : "NUM", "TXT", "LINK"
    
    }