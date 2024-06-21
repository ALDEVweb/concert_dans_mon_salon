<?php
/* fragments : fabrique la liste des concerts d'un artiste */

foreach($liste_concert as $id => $concert){
    $artiste = $concert->getTarget("artiste");
    if($artiste->id() === $id_artiste){     
        $zone = $concert->getTarget("zone_geo");
        $type = $concert->getTarget("type_musique");
        ?>
        <ul class="bgwhite padding">
            <li><b>Durée : </b><?= $concert->get("duree") ?> min </li>
            <li><b>Type de lieu recherché : </b><?= $concert->get("type_lieu") ?> </li>
            <li><b>Zone de production :  </b><?= $zone->get("region") ?> </li>
            <li><b>Type de musique : </b><?= $type->get("type") ?> </li>
            <li><b>Prix : </b><?= $concert->get("prix") ?> €</li> 
        </ul>
        <?php
    }
}