<div id="chapitreBanniere">
    <div class="banniere">
        <h2><?=$episodes['titre']?></h2>
    </div>
</div>

<?php foreach($data as $episodes): ?>
<div class="contentChapitre">
    <div class="chapitre">
        <img src="images/<?=$episodes['image']?>" alt="">
        <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>
        <?= $episodes['contenu_chapitre'] ?>
    </div>
</div>
<?php endforeach; ?>