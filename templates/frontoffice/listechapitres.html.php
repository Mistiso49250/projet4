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
                    <a class="btn btn-info" href="index.php?action=chapitre&id=<?=htmlspecialchars($episode['id_chapitre'])?>">Lire le
                        chapitre</a>
                <!-- </div> -->
        </div>
        <?php endforeach; ?>
    </section>

    <ul class="pagination">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>


