<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div>

<?php foreach($data as $episode): ?>
<section class="allChapitre">
    <div class="contentAllChapitre">
        <div class="chapitre">
            <img src="images/<?=$episode['image']?>" alt="">
            <h3 class="chapitreTitle"><?=htmlspecialchars($episode['titre'])?></h3>
            <?=nl2br(htmlspecialchars($episode['contenu_chapitre']))?>
            <div class="lireChapitre">
                <a href="index.php?action=chapitre&id=<?=htmlspecialchars($episode['id_chapitre'])?>">Lire le
                    chapitre</a>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<!-- 
<?php foreach($data as $episode): ?>    
<section class="row">
    <div class="col-md-3 col-lg-3">
        <div class="chapitre">
            <img src="images/<?=$episode['image']?>" alt="">
            <h3 class="chapitreTitle"><?=htmlspecialchars($episode['titre'])?></h3>
            <?=nl2br(htmlspecialchars($episode['contenu_chapitre']))?>
            <div class="lireChapitre">
                <a href="index.php?action=chapitre&id=<?=htmlspecialchars($episode['id_chapitre'])?>">Lire le
                    chapitre</a>
            </div>
        </div>
    </div>
</section> 
<?php endforeach; ?>
-->