<?php
// pour chaque ligne du tableau utilisateur avec le champ artiste à 1, je construis une ligne option avec la valeur et le name du tableau 
foreach($liste_user as $id => $user){
    // si l'utilisateur est un artiste
    if($user->get("artiste") === "1"){
        // je crée une un artiste
        ?>
        <div class="carte-liste mt16 smallPadding bgblue">
            <div class="flex j-between align-center">
                <p><b><u> <?= $user->get("nom") ?> </u></b></p>
                <div class="flex gap16 align-center">
                    <a href="afficher_detail_utilisateur.php?id=<?= $user->id() ?>"><button class="smallPadding bgwhite b-none">Ses concerts</button></a>
                    <a href="afficher_form_envoi_message.php?idInterlocuteur=<?= $user->id() ?>"><button class="smallPadding bgwhite b-none">Contacter</button></a>
                </div>
            </div>
            <ul>
                <li><b>Présentation :</b> <?= $user->get("pres_artiste") ?> </li>
                <li><b>Musique :</b> <?= $user->get("desc_musique") ?> </li>
            </ul>
        </div>
        <?php
    } // sinon on ne fait rien
}
?>