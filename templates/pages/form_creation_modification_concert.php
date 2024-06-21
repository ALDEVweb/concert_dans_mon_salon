<?php
/*
template : Affiche le formulaire concert vierge si dde création concert / sinon rempli les champs et ajoute btn modifier et supprimer
parametre : $id_user : id de l'utilisateur 
            $oncert : si form modif
            (si création : aucun)
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de modification/création d'un utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if($idConcert !== 0){
        $titre = "Modification du concert";
        $submit = "Modifier le concert";
        $prix = $concert->get("prix");
        $duree = $concert->get("duree");
        $idMusique = $concert->get("type_musique");
        $musique = $concert->getTarget("type_musique");
        $musiqueType = $musique->get("type");
        $idZone = $concert->get("zone_geo");
        $zone = $concert->getTarget("zone_geo");
        $region = $zone->get("region");
        $lieu = $concert->get("type_lieu");
    }else{
        $titre = "Création d'un concert";
        $submit = "Créer le concert";
        $prix = "";
        $duree = "";
        $idMusique = "";
        $musiqueType = "";
        $idZone = "";
        $region = "";
        $lieu = "";
    }
    
    ?>
    <h1 class="txt-center mt40"><?= $titre ?></h1>
    <form action="ajouter_modifier_concert.php?idConcert=<?= $idConcert ?>" method="POST" class="wfit mt40 mrlauto">
    <label>Prix (€): <br><input class="w250p" type="number" name="prix" id="prix" value="<?= $prix ?>"></label><br>
    <div class="mt16">
        <label>Durée (min): <br><input class="w250p" type="number" name="duree" id="duree" value="<?= $duree ?>"></label><br>
    </div>
    <div class="mt16">
        <label>Type de musique : <br><select class="w250p" name="type" id="filtre_type">
            <?php
            if($idConcert !== 0){
                "<option value='$idMusique'>$musiqueType</option>";
            }else{
            echo "<option value=''>Choisissez un type de musique</option>";
            }
            // inclure select type de musique
            include "templates/fragments/select_type.php";
            ?>
        </select></label><br>
    </div>
    <div class="mt16">
        <label>Région d'intervention : <br><select class="w250p" name="region" id="region">
            <?php
            if($idConcert !== 0){
                "<option value='$idZone'>$region</option>";
            }else{
                echo "<option value=''>Choisissez une région</option>";
            }
            // inclure select type de musique
            include "templates/fragments/select_zone.php";
            ?>
        </select></label><br>
    </div>
    <div class="mt16">
        <label>Type de lieu : <br><textarea class="w250p" name="type_lieu" id="type_lieu" cols="30" rows="6"><?= $lieu ?></textarea></label><br>
    </div>
    <input class="w250p mt16 bgwhite smallPadding b-none" type="submit" value="<?= $submit ?>">
    </form>
    <div class="mt40 wfit mrlauto">
        <a href="afficher_accueil.php"><button class="bgwhite smallPadding b-none mr16">Annuler</button></a>
        <?php
        if($id_user !== 0){
            ?>
            <a href="supprimer_concert.php?idConcert=<?= $idConcert ?>"><button class="bgwhite smallPadding b-none">Supprimer ce concert</button></a>
            <?php
        }
        ?>
    </div>
</body>
</html>