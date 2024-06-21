<?php
// pour chaque ligne du tableau zone je construis une ligne option avec la valeur et le name du tableau 

// pour chaque element du tableau
foreach ($liste_zone as $id => $region){
    // je crée une ligne option
    ?>
    <option value="<?= $region->id() ?>"><?= $region->get("region") ?></option>
    <?php
}
?>