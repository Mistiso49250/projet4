<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div>

<?php foreach($data as $episodes): ?>
<section class="allChapitre">
    <div class="contentAllChapitre">
        <div class="chapitre">
            <img src="images/<?= htmlspecialchars($data->img)?>" alt="">
            <h3 class="chapitreTitle"><?=htmlspecialchars($data->title)?></h3>
            <?=htmlspecialchars($data->content)?>
            <div class="lireChapitre">
                <a href="index.php?action=chapitre&id=<?=htmlspecialchars($data->id)?>">Lire le
                    chapitre</a>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<!-- <section class="row">
    <div class="col-md-3 col-lg-3">
        <div class="chapitre">
            <img src="images/" alt="">
            <h3 class="chapitreTitle"></h3>
            
            <div class="lireChapitre">
                <a href="index.php?action=chapitre&id=">Lire le
                    chapitre</a>
            </div>
        </div>
    </div>
</section> -->