<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div> 

<?php foreach($data['episode'] as $episodes): ?>
<section class="allChapitre"> 
    <div class="contentAllChapitre"> 
            <div class="chapitre">
                <img src="images/<?= htmlspecialchars($episodes['image'])?>" alt="">
                <h3 class="chapitreTitle"><?=htmlspecialchars($episodes['titre'])?></h3>
                <?=htmlspecialchars($episodes['contenu_chapitre'])?>
                <div class="lireChapitre">
                <a href="index.php?action=chapitre&id=<?=htmlspecialchars($episodes['id_chapitre'])?>">Lire le chapitre</a>
            </div>
        </div>
    </div> 
</section>
<?php endforeach; ?>