<!-- gestion authentification -->
<?php
if(!isset($_SESSION['auth'])){
    $_SESSION['flash']['danger'] = "Veuillez vous identifié pour accéder a l\'administration";
    header('Location: index.php?action=login');
    exit();
}
?>

<div class="listComments">
    <div class="col-lg-12">
        <h2 moderer>Liste des commentaires</h2>
        <!-- gestion des notifications -->
        <?php if(($data['session'])->hasFlashes()): ?>
        <?php foreach(($data['session'])->getFlashes() as $type => $message): ?>
        <div class="alert alert-<?=$type;?>">
            <?=$message;?>
        </div>
        <?php endforeach;?>
        <?php endif;?>
        <!-- affichage des commentaires -->
        <section class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Date de publication</th>
                        <th>Modérer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($data['commentaires'] as $commentaire): ?>
                    <?php 
                        $trClass = "";
                        if((int)$commentaire['signaler'] !== 0){
                            $trClass = 'red';
                        } ?>
                    <tr class="<?= $trClass ?>">
                        <td><?=htmlspecialchars($commentaire['pseudo'])?></td>
                        <td><?= nl2br(htmlspecialchars(($commentaire['contenu'])))?></td>
                        <td><?=$commentaire['date_commentaire_fr'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="btn-group">
                                        <a class="btn btn-success" type="submit"
                                            href="index.php?action=ignoreReportComment&id=<?=$commentaire['id_commentaire']?>"></span>Autoriser</a>

                                        <!-- Button trigger modal-->
                                        <button type="button" class="pull-right btn btn-danger" data-toggle="modal"
                                            data-target="#modalConfirmDelete">Supprimer</button>

                                        <!--Modal: modalConfirmDelete-->
                                        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-notify modal-danger"
                                                role="document">
                                                <!--Content-->
                                                <div class="modal-content text-center">
                                                    <!--Header-->
                                                    <div class="modal-header d-flex justify-content-center">
                                                        <p class="heading">Êtes-vous sur de vouloirs supprimer ce
                                                            commentaire ?</p>
                                                    </div>

                                                    <!--Body-->
                                                    <div class="modal-body">

                                                        <i class="fas fa-times fa-4x animated rotateIn"></i>

                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer flex-center">
                                                        <a href="index.php?action=deleteComment&id=<?=$commentaire['id_commentaire']?>" class="btn  btn-outline-danger">Oui</a>
                                                        <a type="button" class="btn  btn-danger waves-effect"
                                                            data-dismiss="modal">Non</a>
                                                    </div>
                                                </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>
                                        <!--Modal: modalConfirmDelete-->

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </section>
        <!-- pagination -->
        <div class="d-flex justify-content-between my4">
            <?php 
        if($data['pagePrecedente'] !==0): ?>
            <a href="index.php?action=moderateComment&page=<?= $data['pagePrecedente'] ?>" class="btn btn-info">&laquo;
                Page précédente</a>
            <?php endif ?>
            <?php
        if($data['pageSuivante'] !== 0): ?>
            <a href="index.php?action=moderateComment&page=<?= $data['pageSuivante']?>"
                class="btn btn-info ml-auto">Page
                suivante &raquo;</a>
            <?php endif ?>
        </div>

    </div>
</div>