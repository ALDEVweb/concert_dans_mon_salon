<form action="afficher_recherche.php" method="GET" class="bgwhite mrlauto wfit padding mt40">
    <select name="type" id="filtre_type" class="mr16 bgblue smallPadding b-none">
        <option value="">Choisissez un type de musique</option>
        <?php 
            // inclure select type de musique
            include "templates/fragments/select_type.php";
        ?>
    </select>
    <select name="region" id="region" class="mr16 bgblue smallPadding b-none">
        <option value="">Choisissez une région</option>
        <?php 
            // inclure select type de musique
            include "templates/fragments/select_zone.php";
        ?>
    </select>
    <input type="submit" value="🔍 Rechercher un concert" class="bgblue smallPadding b-none">      
</form>