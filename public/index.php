<?php
declare(strict_types=1);

require'../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;


if (isset($_GET['action'])) {
    if ($_GET['action'] === 'homepage') {
        $controller = new HomePageController();
        $controller->homePage();
    }
    elseif ($_GET['action'] === 'listchapitre') {
        $controller = new ChapitreController();
        $controller->listChapitre();

    }elseif ($_GET['action'] === 'chapitre') {
        chapitre($_GET['id']);
        // $controller = new ChapitreController();
        // $controller->chapitre();
    }
}
else {
    homePage();
}