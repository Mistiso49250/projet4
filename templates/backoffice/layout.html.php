<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/sgucpkg0rglmeqtnxrrh880aputls1kntjwzgi5htko37n9y/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <link rel="stylesheet" href="css/back/style.css">

    <title>Administration</title>
</head>

<body>

    <?php
    // Afficher la page
    ?>
    <header>
        <!-- <button class="btn btn-exit"><a href='index.php?action=logout'>Se déconnecter</button> -->
        <nav class='admin'>
            <ul>
                <li class="create"><a href='#'>Créer un chapitre</a></li><i class="fas fa-pen-nib">
                <li class="edit"><a href='#'>Editer un chapitre</a></li><i class="far fa-edit">
                <li class="comment"><a href='#'>Commentaires</a></li><i class="fas fa-list-ul">
                <li class="out"><a href='#'>Quitter</a></li><i class="fas fa-sign-out-alt">
                <li class="goOut"><a href='index.php?action=logout'>Se déconnecter</li>
            </ul>
        </nav>
    </header>
    <?= $content ?>

</body>

</html>