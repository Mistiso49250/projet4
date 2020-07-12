<div id="chapitreBanniere">
    <div class="banniere">
        <h2><?= htmlspecialchars($data['title'])?></h2>
    </div>
</div>


<div class="contentChapitre">
    <div class="chapitre">
        <img src="images/<?= ($data['img'])?>" alt="">
        <h3 class="chapitreTitle"><?= htmlspecialchars($data['title'])?></h3>
        <?= nl2br(htmlspecialchars($data['content'])) ?>
    </div>
</div>

