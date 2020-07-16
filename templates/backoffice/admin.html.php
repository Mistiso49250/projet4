<?php ?>

<div class="row chapitre">
    <div class="col-lg12">
        <h2></i>Liste des chapitres</h2>

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
            </table>
        </section>

    </div>
</div>

<form action="" class="col-lg-6" method="POST">
    <legend>Ecrire un chapitre</legend>
    <div class="form-group">
        <label for="texte">Titre: </label>
        <input id="text" type="text" name="titre" class="form-control" maxlength="255">
    </div>
    <div class="form-group">
        <label for="textarea">Contenu: </label>
        <input id="textarea" type="textarea" name="contenu" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Publier</button>
        <button class="btn btn-danger" type="submit">Réinitialiser</button>
    </div>
</form>