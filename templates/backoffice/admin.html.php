<!-- gestion des notifications -->
<?php if(($data['session'])->hasFlashes()): ?>
<?php foreach(($data['session'])->getFlashes() as $type => $message): ?>
<div class="alert alert-<?=$type;?>">
    <?=$message;?>
</div>
<?php endforeach;?>
<?php endif;?>

<div class="row chapitre">
    <div class="col-lg-12">
        <h2>Liste des chapitres</h2>

        <section class="table-responsive">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Numéro de chapitre</th>
                        <th>Extraits des chapitres</th>
                        <th>Date de publication</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['list'] as $episode): ?>
                    <tr>
                        <td><?=htmlspecialchars($episode['titre'])?></td>
                        <td><?=htmlspecialchars($episode['numchapitre'])?></td>
                        <td><?=htmlspecialchars($episode['extrait'])?></td>
                        <td><?=htmlspecialchars($episode['date_publication'])?></td>
                        <td>
                            <a href="index.php?action=getPostUpdate&id_chapitre=<?=$episode['id_chapitre']?>"
                                class="btn btn-success">Editer</a>
                        
                            <!-- Button trigger modal-->
                            <button type="button" class="pull-right btn btn-danger" data-toggle="modal"
                                data-target="#modalConfirmDelete">Supprimer</button>

                            <!--Modal: modalConfirmDelete-->
                            <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">Êtes-vous sur de vouloirs supprimer ce chapitre ?</p>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">

                                            <i class="fas fa-times fa-4x animated rotateIn"></i>

                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer flex-center">
                                            <a href="index.php?action=deleteChapitre&id_chapitre=<?=$episode['id_chapitre']?>" class="btn  btn-outline-danger">Oui</a>
                                            <a type="button" class="btn  btn-danger waves-effect"
                                                data-dismiss="modal">Non</a>
                                        </div>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal: modalConfirmDelete-->


                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </section>

        <div class="d-flex justify-content-between my4">
            <?php 
        if($data['pagePrecedente'] !==0): ?>
            <a href="index.php?action=admin&page=<?= $data['pagePrecedente'] ?>" class="btn btn-info">&laquo;
                Page
                précédente</a>
            <?php endif ?>
            <?php
        if($data['pageSuivante'] !== 0): ?>
            <a href="index.php?action=admin&page=<?= $data['pageSuivante']?>" class="btn btn-info ml-auto">Page
                suivante &raquo;</a>
            <?php endif ?>
        </div>

    </div>
</div>