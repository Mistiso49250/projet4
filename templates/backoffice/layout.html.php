<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/87ylpwmfvj5agj87x60ppz6xujw6td9ztbkfeauvvh645dgo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Document</title>
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