<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Liste des chapitres</h2>
    </div>
</div>


<div class="containerBootstrap">
    <section class="row">
        <?php foreach($data['list'] as $episode): 
             if((int)$episode['publier'] !== 0){ ?>
            <div class="col-md-4 col-lg-4">
                <a href='#' class="thumbnail">
                    <img src="images/<?=$episode['image']?>" alt="" class="img-rounded">
                </a>
                <h3 class="chapitreTitle"><?=$episode['titre']?></h3>
                <p><?=$episode['extrait']?></p>
                <!-- <div class="lireChapitre"> -->
                <a class="btn btn-info" href="index.php?action=chapitre&id=<?=$episode['id_chapitre']?>">Lire le
                    chapitre</a>
                <!-- </div> -->
            </div>
            <?php
                } else{
                ?>
            <p>La suite au prochain épisode</p>
            <?php
                }
                ?>
        <?php endforeach; ?>
    </section>

    <div class="d-flex justify-content-between my4">
        <?php 
        if($data['pagePrecedente'] !==0): ?>
        <a href="index.php?action=listchapitre&page=<?= $data['pagePrecedente'] ?>" class="btn btn-info">&laquo; Page
            précédente</a>
        <?php endif ?>
        <?php
        if($data['pageSuivante'] !== 0): ?>
        <a href="index.php?action=listchapitre&page=<?= $data['pageSuivante']?>" class="btn btn-info ml-auto">Page
            suivante &raquo;</a>
        <?php endif ?>
    </div>

</div>