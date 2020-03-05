<?php foreach($data as $episodes): ?>
<div class="chapitre">
    <img src="public/images/<?=$episodes['image']?>" alt="">
    <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>
    <?= $episodes['contenu_chapitre'] ?>
    <div class="lireChapitre">
        <a href="index.php?action=chapitre&id=<?=$episodes['id_chapitre']?>">Lire le chapitre</a>
    </div>
</div>
<?php endforeach; ?>


<!-- <div id="chapitreBanniere">
        <div class="banniere">
            <h2>Liste des chapitres</h2>
        </div>
    </div> -->

    <!-- <section class="allChapitre"> -->
        <!-- <div class="contentAllChapitre"> -->
        <!-- php content  -->
        <!-- </div> -->
    <!-- </section> -->