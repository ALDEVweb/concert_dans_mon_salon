<?php
// pour chaque ligne du tableau concert 
foreach($mesConcerts as $id => $concert){
    $zone = $concert->getTarget("zone_geo");
    $type = $concert->getTarget("type_musique");
    // je crée une un artiste
    ?>
    <div class="carte-liste mt16 smallPadding bgwhite flex gap50 wfit mrlauto">
        <ul class="w350p">
            <li><b>Durée : </b><?= $concert->get("duree") ?> min </li>
            <li><b>Type de lieu recherché : </b><?= $concert->get("type_lieu") ?> </li>
            <li><b>Zone de production :  </b><?= $zone->get("region") ?> </li>
            <li><b>Type de musique : </b><?= $type->get("type") ?> </li>
            <li><b>Prix : </b><?= $concert->get("prix") ?> €</li>
        </ul>
        <div class="flex column j-center gap16 align-center">
            <a href="afficher_form_creation_modification_concert.php?idConcert=<?= $concert->id() ?>"><button class="bgblue smallPadding b-none">Modifier</button></a>
            <a href="supprimer_concert.php?idConcert=<?= $concert->id() ?>"><button class="bgblue smallPadding b-none">Supprimer</button></a>
        </div>
    </div>
    <?php
}
?>