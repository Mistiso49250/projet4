<!-- gestion des notifications -->
<?php if(($data['session'])->hasFlashes()): ?>
<?php foreach(($data['session'])->getFlashes() as $type => $message): ?>
<div class="alert alert-<?=$type;?>">
    <?=$message;?>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- tableau modification chapitre -->
<div class="row justify-content-center">
    <form action="index.php?action=updateChapitre&id_chapitre=<?=$data['episode']['id_chapitre']?>" class="col-lg-12"
        method="POST" enctype="multipart/form-data">
        <h2 id="modifier">Modifier un chapitre</h2>
        <div class="form-group">
            <label for="file">Séléctionner une image:</label>
            <input type="file" name="uploaded_file" id="uploaded_file">
            <button type="submit" name="submit">Enregistrer</button>
        </div>
        <div class="form-group">
            <label for="texte">Titre: </label>
            <input id="text" type="text" name="titre" class="form-control" value="<?=$data['post']['titre']?>"
                maxlength="255">
        </div>
        <div class="form-group">
            <label for="number">Numéro de chapitre: </label>
            <input id="number" type="number" name="numchapitre" class="form-control" value="<?=$data['post']['numchapitre']?>"> 
        </div>
        <div class="form-group">
            <label for="textarea">Extrait:</label>
            <textarea name="extrait" id="textarea" cols="30" rows="10"><?=$data['post']['extrait']?></textarea>
        </div>
        <div class="form-group">
            <label for="textarea">Contenu: </label>
            <textarea name="contenu_chapitre" id="textarea" cols="30"
                rows="25"><?=$data['post']['contenu_chapitre']?></textarea>
        </div>

        <?php
        if((int)$data['episode']['publier'] !== 0){?>
            <div class="form-group">
                <button type="submit" formaction="index.php?action=updateChapitre&id_chapitre=<?=$data['episode']['id_chapitre']?>" 
                class="btn btn-info">Sauvegarder</button>
            </div>
        <?php
        } else{
            ?>
        <div class="form-group">
            <button type="submit" class="btn btn-success" >Publier</button>
            <button type="submit" formaction="index.php?action=save" class="btn btn-info">Sauvegarder</button>
            <a href="index.php?action=admin" type="submit" class="btn btn-danger">Annuler</a>
            
        </div>
        <?php
        }
        ?>

    </form>
</div>