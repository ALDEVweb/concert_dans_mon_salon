<?php
/* 
fragment : construit le header connecté
*/
?>

<ul class="flex gap16">
    <li><a href="afficher_messagerie.php"><button class="b-none smallPadding bgwhite">Messagerie <?= $nonlu ?></button></a></li>
    <?php
    if($user->get("artiste") === "1"){
        ?>
        <li><a href='afficher_mes_concerts.php'><button class="b-none smallPadding bgwhite">Mes concerts</button></a></li>
        <li><a href="afficher_form_creation_modification_concert.php"><button class="b-none smallPadding bgwhite">Créer un concert</button></a></li>
        <?php
    }
    ?>
</ul>
<h1>Concert dans mon salon</h1>
<ul class="flex gap16">
<li> <?= $nom ?> </li>
    <li><a href="afficher_form_creation_modification_utilisateur.php"><button class="b-none smallPadding bgwhite">Mon compte</button></a></li>
    <li><a href="deconnecter_utilisateur.php"><button class="b-none smallPadding bgwhite">Deconnexion</button></a></li>
</ul>
