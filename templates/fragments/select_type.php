<?php
// pour chaque ligne du tableau type je construis une ligne option avec la valeur et le name du tableau 

// pour chaque element du tableau
foreach ($liste_type as $id => $musique){
    // je crée une ligne option
    ?>
    <option value="<?= $musique->id() ?>"><?= $musique->get("type") ?></option>
    <?php
}
?>