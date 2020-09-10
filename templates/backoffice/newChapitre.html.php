<div class="row justify-content-center">
    <form action="index.php?action=newChapitre" class="col-lg-12" method="POST" enctype="multipart/form-data">
        <!-- enctype = "multipart / form-data". Spécifie le type de contenu à utiliser lors de la soumission du formulaire -->
        <h2 id="ecrire">Ecrire un chapitre</h2><br>
        <div class="form-group">
            <label for="fileUpload">Séléctionner une miniature pour l'index des chapitres:</label>
            <input type="file" name="photo" id="fileUpload">
            <!-- L'attribut type = "file" de la balise <input> montre le champ d'entrée comme un contrôle de sélection de fichier, 
            avec un bouton "Parcourir" à côté du contrôle d'entrée -->
            <input type="submit" name="submit" value="Téléchargement">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille
                maximale de 5 Mo.</p>
        </div>
        <div class="form-group">
            <label for="texte">Titre: </label>
            <input id="text" type="text" name="titre" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="textarea">Extrait:</label>
            <textarea name="extrait" id="textarea" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="fileUpload">Séléctionner une image pour le contenu du chapitre:</label>
            <input type="file" name="photo" id="fileUpload">
            <input type="submit" name="submit" value="Téléchargement">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille
                maximale de 5 Mo.</p>
        </div>
        <div class="form-group">
            <label for="textarea">Contenu: </label>
            <textarea name="contenu_chapitre" id="textarea" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Publier</button>
            <button type="submit" class="btn btn-danger">Réinitialiser</button>
        </div>
    </form>
</div>