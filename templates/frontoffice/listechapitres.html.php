<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div>




<div class="containerBootstrap">
    <section class="row">
        <?php foreach($data as $episode): ?>
        <div class="col-md-4 col-lg-4">
            <a href='#' class="thumbnail">
                <img src="images/<?=$episode['image']?>" alt="" class="img-rounded">
            </a>
            <h3 class="chapitreTitle"><?=htmlspecialchars($episode['titre'])?></h3>
            <p><?=nl2br(htmlspecialchars($episode['contenu_chapitre']))?></p>
            <!-- <div class="lireChapitre"> -->
            <a class="btn btn-info"
                href="index.php?action=chapitre&id=<?=htmlspecialchars($episode['id_chapitre'])?>">Lire le
                chapitre</a>
            <!-- </div> -->
        </div>
        <?php endforeach; ?>
    </section>
    
    <div class="d-flex justify-content-between my4">
        <?php if($currentPage > 1): ?>
        <?php 
        $link = "index.php?page=listeChapitre";
        if($currentPage > 2) $link .= '?page=' . ($currentPage - 1);
        ?>
        <a href="<?= $link?>" class="btn btn-primary">&laquo; Page précédente</a>
        <?php endif; ?>
        <?php if($currentPage < $pages): ?>
        <a href="index.php?page=listeChapitre=?page=<?=$currentPage + 1 ?>" class="btn btn-primary ml-auto">Page
            suivante &raquo;</a>
        <?php endif; ?>
    </div>
</div>