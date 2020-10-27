<div id="chapitreBanniere">
    <div class="banniere">
        <h2><?=$data['episode']['titre']?></h2>
    </div>
</div>

<!-- affiche le contenu du chapitre -->
<div class="row justify-content-md-center container-fluid mt-4" id="rowChapitre">
    <div class="col-12-col-7" id="imgChapitre">
        <img src="images/<?= $data['episode']['image']?>" alt="" class="img-fluid">
        <h3 class="chapitreTitle"><?= $data['episode']['titre']?></h3>
        <?=$data['episode']['contenu_chapitre']?>
    </div>
</div>


<div class="form-group" id="retourListeChapitre">
    <a href="index.php?action=listchapitre" type="submit" class="btn btn-success m-3">Retour à la liste des
        chaptires</a>
</div>

<!-- pagination -->
<div class="d-flex justify-content-between container-fluid my4">
    <?php 
        if($data['chapitrePrecedent'] !== null): ?>
    <a href="index.php?action=chapitre&id=<?= $data['chapitrePrecedent'] ?>" class="btn btn-info m-3"
        id="chapitrePrecedent">&laquo; Chapitre
        précédent</a>
    <?php endif ?>
    <?php
        if($data['chapitreSuivant'] !== null): ?>
    <a href="index.php?action=chapitre&id=<?= $data['chapitreSuivant']?>" class="btn btn-info ml-auto m-3"
        id="chapitreSuivant">Chapitre suivant
        &raquo;</a>
    <?php endif ?>
</div>

<!-- gestion des notifications -->
<?php if(($data['session'])->hasFlashes()): ?>
<?php foreach(($data['session'])->getFlashes() as $type => $message): ?>
<div class="alert alert-<?=$type;?>">
    <?=$message;?>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- protection csrf -->

<!-- formulaire ajout commentaire -->
<div class="row container-fluid" id="commentaire">
    <div class="col">
        <hr>
        <h3>Commentaires</h3>
        <form action="index.php?action=addComment&id=<?=$data['episode']['id_chapitre']?>" method="POST">
            <div class="form-group">
                <legend>Laisser un commentaire</legend>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="votre pseudo" aria-describedby="pseudo"
                    required pattern="^[A-Za-z '-]+$" maxlength="20">
            </div>
            <div class="form-group">
                <label for="textarea">Message :</label>
                <textarea id="textarea" name="contenu" rows="5" class="form-control " placeholder="votre message" required pattern="^[A-Za-z '-]+$"></textarea>
            </div>
            <input type="hidden" name="token" id="token" value="<?=$data['token']?>"/>
            <button type="submit" class="pull-right btn btn-info">Envoyer</button>
        </form>
    </div>
</div>


<!-- commentaire et signalement -->
<div class="comment container-fluid">
    <?php foreach($data['commentaires'] as $commentaire):
    $submit = "";
    if((int)$commentaire['signaler'] !== 0){
        $submit = "signale"; ?>
    <p class="signalement">Ce commentaire a été signalé</p>
    <?php
    } 
    ?>

    <p><strong><?=htmlspecialchars($commentaire['pseudo'])?></strong> le <?=$commentaire['date_commentaire_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars(($commentaire['contenu'])))?></p>

    <div class="row justify-content-md-center">
        <div class="col-lg-3">
            <div class="form-group">

                <!-- Button trigger modal-->
                <button type="button" class="pull-right btn btn-danger" id="<?=$submit?>" data-toggle="modal"
                    data-target="#modalConfirmDelete">Signaler</button>

                <!--Modal: modalConfirmDelete-->
                <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content text-center">
                            <!--Header-->
                            <div class="modal-header d-flex justify-content-center">
                                <p class="heading">Êtes-vous sur de vouloirs signalé ce commentaire ?</p>
                            </div>

                            <!--Body-->
                            <div class="modal-body">

                                <i class="fas fa-times fa-4x animated rotateIn"></i>

                            </div>

                            <!--Footer-->
                            <div class="modal-footer flex-center">
                                <a href="index.php?action=commentReport&id=<?=$commentaire['id_commentaire']?>&chapitre_id=<?=$commentaire['id_chapitre']?>"
                                    class="btn  btn-outline-danger">Oui</a>
                                <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Non</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: modalConfirmDelete-->

            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>