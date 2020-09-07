<div class="listComments">
    <div class="col-lg-12">
        <h2 moderer>Liste des commentaires</h2>
        <!-- <div class="action">
            <a href="index.php?action=getComment&orderBy=date_commentaire"></a>
        </div> -->
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
                                <?php foreach($data['commentaires'] as $commentaire): ?>
                                    <div class="btn-group">
                                        <a class="btn btn-warning" href="index.php?action=editComment&id=<?=$commentaire['id_commentaire']?>"><span class="glyphicon glyphicon-pencil"></span>modérer</a>
                                        <a onclick="return confirm('Voulez vous vraiment suprimer ce contenu ?');
                                         "href="index.php?action=deleteComment&id=<?=$commentaire['id_commentaire']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>supprimer</a>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div> 
                    </tr>
                </tbody>
            </table>
        </section>

    </div>
</div>