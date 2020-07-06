<?php ?>
<!-- espace chapitres -->
<div class="main">
    <section class="chapter-management">
        <h2>Liste de vos chapitres</h2>
        <div class="tab">
            <table class="tableChapter">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Chapitre</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $episode): ?>
                    <tr>
                        <td><?=$episodes['titre']?></td>
                        <td> <?=$episodes['id_chapitre']?></td>
                        <td> <?=$episodes['date_publication']?></td>
                        <td>
                            <a class="btn btn-success" href="modiferChapitre">Modifier</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="supprimerChapitre"
                                onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?'));">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="add-chapter">
        <h2>Ajouter un chapitre</h2>
        <hr>
        <form action="index.php?action=addChapter" method="post">
            <h3>Titre</h3>
            <div class="form-group">
                <input type="text" name="newTitle">
            </div>
            <h3>Chapitre</h3>
            <div class="form-group">
                <textarea name="newChapter" cols="30" rows="10">
                </textarea>
            </div>
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
    </section>

    </main>

</div>

<!-- espace commentaires -->

<div class="main">
    <section class="reporting-comments">
        <h2>Liste des commentaires signalés</h2>
        <?php 
            if (isset($_GET['comm']) && $_GET['comm'] === 'validate') {
                echo '<div class="alert alert-info">Le commentaire a bien été validé.</div>';
            }

            if (isset($_GET['comm']) && $_GET['comm'] === 'delete') {
                echo '<div class="alert alert-danger">Le commentaire a bien été supprimé de la base de donnée.</div>';
            }
            ?>
        <div class="tab">
            <table class="tableComment">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Commentaire</th>
                        <th>Chapitre ciblé</th>
                        <th>Date</th>
                        <th>Traitement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report as $data): ?>
                    <tr>
                        <td><?=($data['pseudo'])?></td>
                        <td><?=($data['contenu'])?></td>
                        <td> <?= $data['id_chapitre'] ?></td>
                        <td><?= $data['date_commentaire']?></td>
                        <td>
                            <a class="btn btn-warning" href="<?= $data['id_commentaire']?>" class="gestionCommentaire">Gérer</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="commentManagement">
        <h2>Liste des commentaires</h2>
        <hr>
        <div class="tab">
            <table class="tableListComment">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Commentaire</th>
                        <th>Chapitre ciblé</th>
                        <th>Date</th>
                        <th>Lire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $comments): ?>
                    <tr>
                        <td><?=$data['pseudo']?></td>
                        <td><?=$data['contenu']?></td>
                        <td><?=$data['id_chapitre']?></td>
                        <td><?=$data['date_commentaire']?></td>
                        <td>
                            <a class="btn btn-info" href="index.php?action= <?=$data['id_comment']?>"
                                class="link-view">
                                Voir
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
    </main>
</div>

<!-- Modif chapitre -->

<div class="main">
    <section class="modif">
        <h2>Modification</h2>
        <form action="<?=$data['id_chapitre']?>" method="post">
            <h3>Titre</h3>
            <div class="form-group">
                <input type="text" name="editTitle" value="<?=$episodes['titre']?>">
            </div>
            <h3>Chapitre</h3>
            <div class="form-group">
                <textarea name="editChapter" cols="30" rows="10">
                    <?= nl2br(htmlspecialchars_decode($chapter_single['chapter']))?>
                </textarea>
            </div>
            <button class="btn btn-success" onclick="return(confirm('Êtes-vous sûr de vouloir modifier ce chapitre?'));" type="submit">Modifier</button>
        </form>
        
    </section>
</div>
