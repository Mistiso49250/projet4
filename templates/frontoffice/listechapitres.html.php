<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div>




<div class="containerBootstrap">
    <section class="row">
        <?php foreach($data['list'] as $episode): ?>
        <div class="col-md-4 col-lg-4">
            <a href='#' class="thumbnail">
                <img src="images/<?=$episode['image']?>" alt="" class="img-rounded">
            </a>
            <h3 class="chapitreTitle"><?=htmlspecialchars($episode['titre'])?></h3>
            <p><?=nl2br(htmlspecialchars($episode['extrait']))?></p>
            <!-- <div class="lireChapitre"> -->
            <a class="btn btn-info"
                href="index.php?action=chapitre&id=<?=htmlspecialchars($episode['id_chapitre'])?>">Lire le
                chapitre</a>
            <!-- </div> -->
        </div>
        <?php endforeach; ?>
    </section>
    
    <div class="d-flex justify-content-between my4">
        <a href="" class="btn btn-primary">&laquo; Page précédente</a>
        <a href="index.php?action=listeChapitre&page=1" class="btn btn-primary ml-auto">Page
            suivante &raquo;</a>
    </div>
</div>