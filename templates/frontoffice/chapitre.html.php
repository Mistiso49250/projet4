<div id="chapitreBanniere">
    <div class="banniere">
        <h2><?=$data['episode']['titre']?></h2>
    </div>
</div>

<!-- affiche le contenu du chapitre -->
<div class="contentChapitre">
    <div class="chapitre">
        <img src="images/<?= $data['episode']['image']?>" alt="">
        <h3 class="chapitreTitle"><?= $data['episode']['titre']?></h3>
        <?=$data['episode']['contenu_chapitre']?>
    </div>
</div>

<div class="form-group">
    <a href="index.php?action=listchapitre" type="submit" class="btn btn-success">Retour à la liste des chaptires</a>
</div>
<!-- pagination -->
<div class="d-flex justify-content-between my4">
    <?php 
        if($data['chapitrePrecedent'] !==0): ?>
    <a href="index.php?action=chapitre&id=<?= $data['chapitrePrecedent'] ?>" class="btn btn-info">&laquo; Chapitre précédent</a>
    <?php endif ?>
    <?php
        if($data['chapitreSuivant'] !== 0): ?>
    <a href="index.php?action=chapitre&id=<?= $data['chapitreSuivant']?>" class="btn btn-info ml-auto">Chapitre suivant &raquo;</a>
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

<!-- formulaire ajout commentaire -->
<h2>Commentaires: </h2>
<form action="index.php?action=addComment&id=<?=$data['episode']['id_chapitre']?>" method="POST"
    class="form-horizontal col-lg-6">
    <div class="form-group">
        <legend>Laisser un commentaire</legend>
    </div>
    <div class="row">
        <div class="form-group has-success">
            <label for="idSuccess" class="col-lg-2 control-label">Pseudo : </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="pseudo" id="idSuccess">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="textarea" class="col-lg-2 control-label">Message : </label>
            <div class="col-lg-10">
                <input type="textarea" class="form-control" name="contenu" id="textarea">
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="pull-right btn btn-info">Envoyer</button>

    </div>
</form>

<!-- commentaire et signalement -->
<div>
    <?php foreach($data['commentaires'] as $commentaire): ?>
       
    <p><strong><?=htmlspecialchars($commentaire['pseudo'])?></strong> le <?=$commentaire['date_commentaire_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars(($commentaire['contenu'])))?></p>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <button type="submit" class="btn btn-info"><a onclick="return confirm('Voulez vous vraiment signaler ce commentaire ?'); "
                    href="index.php?action=commentReport&id=<?=$commentaire['id_commentaire']?>&chapitre_id=<?=$commentaire['id_chapitre']?>">Signaler</a></button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>