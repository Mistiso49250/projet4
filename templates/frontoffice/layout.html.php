<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="css/front/testMenu.css">

    <title>Jean Forteroche Ecrivain</title>
</head>


<body>
    <div class="siteContainer">
        <div class="sitePusher">
            <section class="burger">
                <a href="#" class="burgerIcon" id="burgerIcon"></a>
                <ul class="menu">
                    <li><a href="index.html">Acceuil</a></li>
                    <li><a href="tousLesChapitres.html">Un Billet Simple pour l'Alaska</a></li>
                    <ul>
                        <li><a href="tousLesChapitres.html">Tous les chapitres</a></li>
                        <li><a href="prologue.html">Prologue</a></li>
                        <li><a href="chapitre1.html">Chapitre 1</a></li>
                        <li><a href="chapitre2.html">Chapitre 2</a></li>
                        <li><a href="chapitre3.html">Chapitre 3</a></li>
                        <li><a href="chapitre4.html">Chapitre 4</a></li>
                        <li><a href="chapitre5.html">Chapitre 5</a></li>
                    </ul>
                    <li><a href="admin.html">Admin</a></li>
                </ul>
            </section>

            <div class="siteContent">
                <div class="container">
                    <?= $content ?>
                </div>
            </div>
            <div class="siteCache" id="siteCache"></div>
        </div>
    </div>

    <script src="js/front/main.js"></script>

</body>

</html>