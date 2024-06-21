<?php
// pour chaque ligne du tableau utilisateur avec le champ artiste à 1, je construis une ligne option avec la valeur et le name du tableau 
foreach($liste_concert as $id => $concert){
    $artiste = $concert->getTarget("artiste");
    $zone = $concert->getTarget("zone_geo");
    $type = $concert->getTarget("type_musique");
    // je crée une un artiste
    ?>
    <div class="carte-liste mt16 smallPadding bgblue">
        <div class="flex j-between align-center">
            <p><b><u> <?= $artiste->get("nom") ?> </u></b></p>
            <div class="flex gap16 align-center">
                <a href="afficher_detail_utilisateur.php?id=<?= $artiste->id() ?>"><button class="smallPadding bgwhite b-none"> Voir la fiche artiste </button></a>
                <a href="afficher_form_envoi_message.php?idInterlocuteur=<?= $artiste->id() ?>"><button class="smallPadding bgwhite b-none">Contacter</button></a>     
            </div>
        </div>
        <ul>
            <li><b>Durée :</b> <?= $concert->get("duree") ?> min </li>
            <li><b>Type de lieu recherché :</b> <?= $concert->get("type_lieu") ?> </li>
            <li><b>Zone de production :</b>  <?= $zone->get("region") ?> </li>
            <li><b>Type de musique :</b> <?= $type->get("type") ?> </li>
            <li><b>Prix : <?= $concert->get("prix") ?> €</b></li> 
    </div>
    <?php
}
?>