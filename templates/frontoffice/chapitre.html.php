<div id="chapitreBanniere">
    <div class="banniere">
        <h2><?= htmlspecialchars($data['episode']['titre'])?></h2>
    </div>
</div>


<div class="contentChapitre">
    <div class="chapitre">
        <img src="images/<?= ($data['episode']['image'])?>" alt="">
        <h3 class="chapitreTitle"><?= htmlspecialchars($data['episode']['titre'])?></h3>
        <?= nl2br(htmlspecialchars($data['episode']['contenu_chapitre'])) ?>
    </div>
</div>

