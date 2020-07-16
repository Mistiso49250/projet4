<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/front/style.css">

    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <title>Jean FORTEROCHE</title>
</head>

<body>
    <div class="siteEncadrement">
        <div class="sitePusher">
            <section class="burger">
                <a href="#" class="burgerIcon" id="burgerIcon"></a>
                <ul class="menu">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="index.php?action=listchapitre">Un Billet Simple pour l'Alaska</a></li>
                    <li><a href="index.php?action=admin">Admin</a></li>
                </ul>
            </section>

            <div class="siteContent">
                <div class="siteContenu">
                    <?= $content ?>
                </div>
            </div>

            <div class="siteCache" id="siteCache"></div>
        </div>
    </div>

    <script src="js\front\main.js"></script>
</body>

</html>