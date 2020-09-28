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
    <form action="index.php?action=updateChapitre&id_chapitre=<?=$data['post']['id_chapitre']?>" class="col-lg-12"
        method="POST">
        <h2 id="modifier">Modifier un chapitre</h2>
        <div class="form-group">
            <label for="fileUpload">Séléctionner une image:</label>
            <input type="file" name="photo" id="fileUpload">
            <!-- L'attribut type = "file" de la balise <input> montre le champ d'entrée comme un contrôle de sélection de fichier, 
            avec un bouton "Parcourir" à côté du contrôle d'entrée -->
            <input type="submit" name="submit" value="Téléchargement">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille
                maximale de 5 Mo.</p>
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
            <textarea name="extrait" id="textarea" value="<?=$data['post']['extrait']?>" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="textarea">Contenu: </label>
            <textarea name="contenu_chapitre" id="textarea" value="<?=$data['post']['contenu_chapitre']?>" cols="30"
                rows="25"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Publier</button>
            <button type="submit" formaction="index.php?action=save" class="btn btn-info">Sauvegarder</button>
            <a href="index.php?action=admin" type="submit" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>