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

    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/sgucpkg0rglmeqtnxrrh880aputls1kntjwzgi5htko37n9y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

    <title>Administration</title>
</head>

<body>

    <div class="container">
        <div class="row-home">
            <div class="col-lg-12">
                <article>
                    <h2>Bienvenue dans l'interface administration</h2>
                </article>
            </div>
        </div>

        <?php
    // Afficher la page
    ?>

        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <h1 class="navbar-brand">Administration</h1>
                </div>
                <ul class="nav nav-bar">
                    <li class="active"><a href="#">Nouveau chapitre</a></li>
                    <li><a href="#">Modifier un chapitre</a></li>
                    <li><a href="#">Modérer les Commentaires</a></li>
                    <li><a href='index.php?action=logout'>Se déconnecter</a></li>
                    <li><a href="#">Commentaires signalé</a></li>
                </ul>
            </div>
        </div>
        <?= $content ?>
    </div>

    <script src="js\back\tinymce\tinymce.min.js"></script>
</body>

</html>