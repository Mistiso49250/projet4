<?php foreach($data as $episodes): ?>
<div class="prologue">
    <img src="public/images/<?=$episodes['image']?>" alt="train Alaska">
    <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>

    <?= $content ?>

    <div class="lireChapitre">
    <a href="index.php?action=chapitre&id=<?=$episodes['id_chapitre']?>">Lire le chapitre</a>
    </div>
</div>
<?php endforeach; ?>