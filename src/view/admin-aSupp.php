<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<?php
// Le mot de passe n'a pas été envoyé
if (!isset($_POST['mot_de_passe']))
{
    // Afficher le formulaire de saisie du mot de passe
   ?>
    <p>Veuillez saisir le mot de passe pour accéder à la partie administrateur</p>
        <form action="admin.php" method="POST">
            <!-- action chemin redirection et method = methode d'envoie -->
            <p><input type="password" name="motDePasse" /></p>
            <p><input type="submit" /></p>
        </form>
   <?php
}// Le mot de passe n'est pas le bon
else if ($_POST['mot_de_passe'] !== "Alaska")
{
    {
        echo '<p>Mot de passe incorrect</p>';
    }
}// Le mot de passe a été envoyé et il est bon
else
{
    // Afficher la page
    ?>
     <header>
        <nav>
            <ul>
                <li><a href=""></a><i class="fas fa-pen-nib"></i>
                    <h5>Créer un chapitre</h5>
                </li>
                <li><a href=""></a><i class="far fa-edit"></i>
                    <h5>Editer un chapitre</h5>
                </li>
                <li><a href=""></a><i class="fas fa-list-ul"></i>
                    <h5>Commentaires</h5>
                </li>
                <li><a href=""></a><i class="fas fa-sign-out-alt"></i>
                    <h5>Quitter</h5>
                </li>
            </ul>
        </nav>
    </header>

    <!--résumé des précedents chapitres -->
    <article>
        <h3>Apreçu des chapitres : </h3>

        <button>
            <h5>Nouveau chapitre</h5>
        </button>

        <table class="table table-striped chapters">
            <thead>
                <tr>
                    <th scope="col">chapitre n°</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Dernière modification</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <!--numero chapitre-->
                    </th>
                    <th scope="row">
                        <!--titre-->
                    </th>
                    <th>
                        <!--contenu-->
                    </th>
                    <th>
                        <!--date publication-->
                    </th>
                    <th>
                        <!--date modification-->
                    </th>
                    <th>
                        <button>editer</button><i class="far fa-edit"></i></a>
                    </th>
                </tr>
            </tbody>
        </table>
    </article>

    <!--commentaire -->
    <article>
        <h3>derniers commentaires</h3>
        <button>tous les commentaires</button>

        <table class="table table-striped comments">
            <thead>
                <tr>
                    <th scope="col">Chapitre n°</th>
                    <th scope="col">par</th>
                    <th scope="col">le</th>
                    <th scope="col">nb de signalement</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Garder</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <!--?php
        $i=0;
           while ($comment = $resumecomments---><tr>
                    <th>
                        <!--id chapitre-->
                    </th>
                    <th>
                        <!--pseudo-->
                    </th>
                    <th>
                        <!--date crea-->
                    </th>
                <th>
                    <div>
                        <!--signalement-->
                    </div>
                    </th>
                    <th>
                        <!--contenu-->
                    </th>
                    <th>
                        <button>garder</button><i class="fas fa-check-square"></i>
                        </a>
                    </th>
                    <td>
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#delet"><i class="far fa-trash-alt"></i>
                        </button>
                        <div class="modal" id="delet" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Êtes-vous sûr de vouloir supprimer ce commentaire<br>
                                            <button>supprimer</button><i class="fas fa-check"></i> oui
                                            </a>
                                        </p>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times"></i> annuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
        </table>
    </article>

    <!--tous les commentaires -->
    <article>
        <h3>Les commentaires</h3>

        <table class="table table-striped comments">
            <thead>
                <tr>
                    <th>Chapitre n°</th>
                    <th>par</th>
                    <th>le</th>
                    <th>nb de signalement</th>
                    <th>Résumé</th>
                    <th>Garder</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <!--resumecomments---><tr>
                    <th>
                        <!--id_chapter-->
                    </th>
                    <th>
                        <!--author-->
                    </th>
                    <th>
                        <!--dateComment-->
                    </th>
                    <th>
                        <div>
                            <!--signalement-->
                        </div>
                    </th>
                    <th>
                        <!--comment-->
                    </th>
                    <th>
                        <button>keepComment<i class="fas fa-check-square"></i>
                    </button>
                    </th>
                    <td>
                        <button type="button">delet<i class="far fa-trash-alt"></i>
                        </button>
                        <div class="modal" id="delet" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Êtes-vous sûr de vouloir supprimer ce commentaire<br>
                                            <button>delet <i class="fas fa-check"></i> oui
                                            </button>
                                        </p>
                                    </div>
                                    <button> <i class="fas fa-times"></i> annuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
        </table>
    </article>

    <div id="administrationChapter">
        <!--Editeur de texte -->
        <article id="create">
            <form action=>
                <div >
                    <h2> Créer un nouveau chapitre : </h2>
                </div>
                <div >
                    <button type="submit">
                        <h5> Enregistrer<br></h5>
                        <i class="far fa-save"></i>
                    </button>
                </div>
                <div class="row">
                    <div >
                        <label for="title">
                            <h3> Titre : </h3>
                        </label>
                        <input type="text" id="title" name="title" value="title">
                    </div>
                    <div >
                        <label for="id_chapter">
                            <h3> Numéro : </h3>
                        </label>
                        <input type="text" id="number_chapter" name="number_chapter" value="number_chapter">
                    </div>
                </div>
                
                <div>
                    <button type="submit" role="submit" class="btn btn-primary">
                        <h5> Enregistrer<br></h5>
                        <i class="far fa-save"></i>
                    </button>
                </div>
            </form>
        </article>
        <!--résumé des derniers chapitres -->
        <article id="fast" class="row">
            <div>
                <h3>Chapitres déjà enregistés:</h3>
            </div>
            
                <table>
                <thead>
                    <tr>
                        <th>chapitre n°</th>
                        <th>titre</th>
                        <th>Résumé</th>
                        <th>Date de publication</th>
                        <th>Editer</th>
                    </tr>
                </thead>
                <tbody>
                    <!--resume---><tr>
                        <th scope="row">
                            <!--id_chapter-->
                        </th>
                        <th scope="row">
                            <!--title-->
                        </th>
                        <th>
                            <!--content-->
                        </th>
    
                        <th>
                            <!--publication_date-->
                        </th>
                        <th><a role="button" class="btn btn-light" href="$url?action=edit&amp;&amp;id_chapter=<?=$res['id_chapter']?>"><i class="far fa-edit"></i></a></th>
                    </tr>
                </tbody>
            </table>
        </article>
    </div>
    
<?php
}
?>
</body>
</html>