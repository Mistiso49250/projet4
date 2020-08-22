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
                    <?php foreach ($data['list'] as $episode): ?>
                    <tr>
                        <td><?=htmlspecialchars($episode['titre'])?></td>
                        <td><?=htmlspecialchars($episode['extrait'])?></td>
                        <td><?=htmlspecialchars($episode['date_publication'])?></td>
                        <td>
                            <a href="index.php?action=getChapitre&id_chapitre=<?=$episode['id_chapitre']?>" class="btn btn-success">Editer</a>
                            <a onclick="return confirm('Voulez vous vraiment surimer ce contenu ?'); "
                                href="index.php?action=?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                   <?php endforeach;?>
                </tbody>
            </table>
        </section>

    </div>
</div>