<?php foreach($data as $episodes): ?>
<div class="chapitre">
    <img src="public/images/<?=$episodes['image']?>" alt="">
    <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>
    <?= $episodes['contenu_chapitre'] ?>
    </div>
</div>
<?php endforeach; ?>


<!--<div id="chapitreBanniere">
        <div class="banniere">
            <h2>Chapitres 1</h2>
        </div>
    </div>

    <div class="contentChapitre">
        <div class="Chapitre">
            php content
        </div>
    </div> -->