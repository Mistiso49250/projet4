<?php ?>

<div class="row chapitre">
    <div class="col-lg-12">
        <h2>Liste des chapitres</h2>

        <section class="table-responsive">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Extraits des chapitres</th>
                        <th>Date de publication</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $episode): ?>
                    <tr>
                        <td><?=htmlspecialchars($episode['titre'])?></td>
                        <td><?=htmlspecialchars($episode['contenu_chapitre'])?></td>
                        <td><?=htmlspecialchars($episode['date_publication'])?></td>
                        <td>
                            <a href="index.php?action=?>" class="btn btn-success">Editer</a>
                            <a onclick="return confirm('Voulez vous vraiment surimer ce contenu ?'); "
                                href="index.php?action=?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                   <?php endforeach;?>
                </tbody>
            </table>
        </section>

    </div>
</div><br>


<form action="index.php?action=newChaptire" class="col-lg-12" method="POST">
        <h2 id="ecrire">Ecrire un chapitre</h2>
    <div class="form-group">
        <label for="texte">Titre: </label>
        <input id="text" type="text" name="titre" class="form-control" maxlength="255">
    </div>
    <div class="form-group">
        <label for="textarea">Contenu: </label>
        <textarea name="contenu" id="textarea" cols="30" rows="10"></textarea>    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Publier</button>
        <button type="submit" class="btn btn-danger">Réinitialiser</button>
    </div>
</form>

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

<div class="listComments">
    <div class="col-lg-12">
        <h2 moderer>Liste des commentaires</h2>
        <div class="action">
            <a href="index.php?action=getComment&orderBy=date_commentaire"></a>
        </div>
        <section class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Date de publication</th>
                        <th>Chapitre</th>
                        <th>Modérer</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        
                        <td>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="index.php?action=editComment&id_commentaire"><span class="glyphicon glyphicon-pencil"></span>modérer</a>
                                        <a onclick="return confirm('Voulez vous vraiment suprimer ce contenu ?'); "
                                href="index.php?action=deleteComment&id_commentaire" class="btn btn-danger" href="index.php?action=editComment&id_commentaire"><span class="glyphicon glyphicon-remove"></span>supprimer</a>
                                    </div>
                                </div>
                            </div> 
                    </tr>
                </tbody>
            </table>
        </section>

    </div>
</div>