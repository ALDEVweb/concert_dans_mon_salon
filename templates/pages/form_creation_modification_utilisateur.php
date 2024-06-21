<?php
/*
template : Affiche le formulaire utilisateur vierge si dde création compte / sinon rempli les champs et ajoute btn modifier et supprimer
parametre : $id_user : id de l'utilisateur 
            $user : si form modif
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
    if($id_user !== 0){
        $compte = "Modification du compte";
        $submit = "Modifier mon compte";
        $nom = $user->get("nom");
        $mail = $user->get("mail");
        $mdp = "Modifier";
        $confirmMdp = "nouveau ";
        $pres = $user->get("pres_artiste");
        $musique = $user->get("desc_musique");
        $ville = $user->get("ville");
        $lieu = $user->get("desc_lieu");
        if($user->get("artiste") === "1"){
            $checkArtiste = "checked";
        }else{
            $checkArtiste = "";
        }
        if($user->get("organisateur") === "1"){
            $checkOrga = "checked";
        }else{
            $checkOrga = "";
        }
    }else{
        $compte = "Création de compte";
        $submit = "Créer mon compte";
        $nom = "";
        $mail ="";
        $mdp = "Créez";
        $confirmMdp = "";
        $checkArtiste = "";
        $checkOrga = "";
        $pres = "";
        $musique = "";
        $ville = "";
        $lieu = "";
    }
    ?>
    <h1 class="txt-center mt40"> <?= $compte ?> </h1>
    <form action="ajouter_modifier_utilisateur.php" method="POST" class="wfit mt40 mrlauto">
        <div class="flex gap50">
            <label>Nom : <br><input class="w250p" type="text" name="nom" id="nom" value="<?= $nom ?>"></label>
            <label>Mail : <br><input class="w250p" type="email" name="mail" id="mail" value="<?= $mail ?>"></label>
        </div>
        <div class="flex gap50 mt16">
            <label><?= $mdp ?> votre mot de passe : <br><input class="w250p" type="text" name="mdp" id="mdp"></label>
            <label>Confirmez votre <?= $confirmMdp ?>mot de passe : <br><input class="w250p" type="text" name="mdpConfirm" id="mdpConfirm"></label>
        </div>
        <div class="mt16 flex gap50">
            <div class="w250p">
                <label><input type="checkbox" name="artiste" id="artiste"  <?= $checkArtiste ?>> Je suis artiste</label>
            </div>
            <label><input type="checkbox" name="organisateur" id="organisateur" <?= $checkOrga ?>> Je suis organisateur</label>
        </div>
        <div class="flex mt16 gap50 align-top">
            <div>
                <label>Présentation (si artiste) : <br><textarea class="w250p" name="pres_artiste" id="pres_artiste" cols="30" rows="6"><?= $pres ?></textarea></label><br>
                <label class="mt16">Description musique (si artiste) : <br><textarea class="w250p" name="desc_musique" id="desc_musique" cols="30" rows="6"><?= $musique ?></textarea></label>
            </div>
            <div class="w200p">
                <label>Ville (si organisateur) : <br><input class="w250p" type="text" name="ville" id="ville" value="<?= $ville ?>"></label><br>
                <label class="mt16">Description du lieu (si organisateur) : <br><textarea class="w250p" name="desc_lieu" id="desc_lieu" cols="30" rows="6" ><?= $lieu ?></textarea></label><br>
            </div>
        </div>
        <div class="mt40 flex gap16 j-center">
            <input class="bgwhite smallPadding b-none" type="submit" value="<?= $submit ?>">
        </div>
    </form>
    <div class="mt40 wfit mrlauto">
        <a class="mr16" href="afficher_accueil.php"><button class="bgwhite smallPadding b-none">Annuler</button></a>
        <?php
        if($id_user !== 0){
            echo "<a href='supprimer_utilisateur.php'><button class='bgwhite smallPadding b-none'>Supprimer mon compte</button></a>";
        }
        ?>
    </div>
    
</body>
</html>
