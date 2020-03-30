<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/sgucpkg0rglmeqtnxrrh880aputls1kntjwzgi5htko37n9y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Administration</title>
</head>

<body>

<?php
    // Afficher la page
    ?>
     <header>
     <button class="btn btn-exit"><a href='../logout.html.php'>Se déconnecter</button>
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
    <?= $content ?>

</body>
</html>