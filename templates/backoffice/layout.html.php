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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <!-- tinymce -->
    <script src="https://cdn.tiny.cloud/1/sgucpkg0rglmeqtnxrrh880aputls1kntjwzgi5htko37n9y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            language:"fr_FR",
            entity_encoding : "raw",
            encoding: "UTF-8",
            selector: 'textarea',
            
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | preview fullpage | ' +
                'forecolor backcolor | help',
                
            menubar: 'favs file edit view insert format tools help',
            content_css: 'css/content.css'
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

        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <h1 class="navbar-brand"><a href="index.php?action=admin"
                            class="badge badge-info">Administration</a></h1>
                </div>
                <ul class="nav nav-bar">
                    <li class="active"><a href="index.php"class="badge badge-success">Retour sur le site</a></li>
                    <li><a href="index.php?action=newChapitre" class="badge badge-info">Nouveau
                            chapitre</a></li>
                    <li><a href="index.php?action=moderateComment" class="badge badge-warning">Modérer les Commentaires
                            <span class="badge badge-light"><?= $data['countReportedComments'] ?></span><span
                                class="sr-only">unread messages</span>
                        </a></li>
                    <li><a href='index.php?action=logout' class="badge badge-secondary">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
        <?= $content ?>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- <script src="js\back\tinymce\tinymce.min.js"></script> -->

</body>

</html>