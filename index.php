
<?php
// require_once('src/Controller/HomePageController.php');
// require_once('src/Controller/AdminController.php');
require_once('src/Controller/ChapitreController.php');
$controller = new ChapitreController();
$controller->listChapitre();



if (isset($_GET['action'])) {
    if ($_GET['action'] === 'homepage') {
        homePage();
    }
    elseif ($_GET['action'] === 'listchapitre') {
        listChapitre();

    }elseif ($_GET['action'] === 'chapitre') {
        chapitre($_GET['id']);
    }
}
else {
    homePage();
}