<form action="index.php?action=updateChapitre&id_chapitre=" class="col-lg-12" method="POST">
        <h2 id="modifier">Modifier un chapitre</h2>
    <div class="form-group">
        <label for="texte">Titre: </label>
        <input id="text" type="text" name="titre" class="form-control" maxlength="255">
    </div>
    <div class="form-group">
        <label for="textarea">Contenu: </label>
        <textarea name="contenu" id="textarea" cols="30" rows="10"></textarea>    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Publier</button>
        <a href="index.php?action=admin" type="submit" class="btn btn-danger">Annuler</a>
    </div>
</form>