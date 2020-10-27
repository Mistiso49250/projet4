<!-- gestion des notifications -->
<?php if(($data['session'])->hasFlashes()): ?>
<?php foreach(($data['session'])->getFlashes() as $type => $message): ?>
<div class="alert alert-<?=$type;?>">
    <?=$message;?>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- gestion authentification -->
<?php
if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Veuillez vous identifié pour accéder a l\'administration";
    header('Location: index.php?action=login');
    exit();
}
?>

<!-- tableaux d'ajout chapitre -->
<div class="row justify-content-center">
    <form action="index.php?action=newChapitre" class="col-lg-12" method="POST" enctype="multipart/form-data">
        <!-- enctype = "multipart / form-data". Spécifie le type de contenu à utiliser lors de la soumission du formulaire -->
        <h2 id="ecrire">Ecrire un chapitre</h2><br>
        <div class="form-group">
            <label for="file">Séléctionner une image:</label>
            <input type="file" name="uploaded_file" id="uploaded_file">
            
            <!-- L'attribut type = "file" de la balise <input> montre le champ d'entrée comme un contrôle de sélection de fichier, 
            avec un bouton "Parcourir" à côté du contrôle d'entrée -->

        </div>
        <div class="form-group">
            <label for="texte">Titre: </label>
            <input id="text" type="text" name="titre" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="number">Numéro de chapitre: </label>
            <input id="number" type="number" name="numchapitre" class="form-control">
        </div>
        <div class="form-group">
            <label for="textarea">Extrait:</label>
            <textarea name="extrait" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="textarea">Contenu: </label>
            <textarea name="contenu_chapitre" cols="30" rows="25"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="image" class="btn btn-success">Publier</button>
            <button type="submit" formaction="index.php?action=save" class="btn btn-info">Sauvegarder</button>
            <a href="index.php?action=admin" type="submit" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>

