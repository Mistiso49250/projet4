<form action="index.php?action=newChapitre" class="col-lg-12" method="POST">
        <h2 id="ecrire">Ecrire un chapitre</h2>
    <div class="form-group">
        <label for="texte">Titre: </label>
        <input id="text" type="text" name="titre" class="form-control" maxlength="255">
    </div>
    <div class="form-group">
        <label for="textarea">Extrait:</label>
        <textarea name="extrait" id="textarea" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="textarea">Contenu: </label>
        <textarea name="contenu_chapitre" id="textarea" cols="30" rows="10"></textarea>    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Publier</button>
        <button type="submit" class="btn btn-danger">Réinitialiser</button>
    </div>
</form>