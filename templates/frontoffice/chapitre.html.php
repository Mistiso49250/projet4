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
<div class="form-group">
    <button type="submit" class=""><a href="index.php?action=listchapitre">Retour à la liste des chaptires</a></button>
</div>

<?php if(Session::getInstance()->hasFlashes()): ?>
    <?php foreach(Session::getInstance()->getFlashes() as $type => $message): ?>
        <div class="alert alert-<?=$type;?>">
            <?=$message;?>
        </div>
    <?php endforeach;?>
<?php endif;?>

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
        <?php foreach($data as $episode): ?>
        <input type="hidden" name='id_chapitre' value="echo $episode['id_chapitre']; ">
        <?php endforeach; ?>
    </div>
</form>


<div>
<?php foreach($data['commentaires'] as $commentaire): ?>
    <p><strong><?=htmlspecialchars($commentaire['pseudo'])?></strong> le <?=$commentaire['date_commentaire_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars(($commentaire['contenu'])))?></p>
    <?php endforeach; ?>
</div>


<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <button type="submit" class="btn btn-info"><a href="index.php?action=adminManager=t=1&id=<?=htmlspecialchars($data['episode']['id_chapitre'])?>">Signaler</a></button>
        </div>
    </div>
</div>
