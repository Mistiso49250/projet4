<?php foreach($data as $episodes): ?>
<div class="chapitre">
    <img src="public/images/<?=$episodes['image']?>" alt="route Alaska">
    <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>
    <?= $episodes['contenu_chapitre'] ?>
    <div class="lireChapitre">
        <a href="index.php?action=chapitre&id=<?=$episodes['id_chapitre']?>">Lire le chapitre</a>
    </div>
</div>
<?php endforeach; ?>
<h1>SALUT</h1>

