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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    

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

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="js\front\main.js"></script>
</body>

</html>