<?php
declare(strict_types=1);

require'../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;
use Oc\Controller\AdminController;


if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listchapitre') {
        $controller = new ChapitreController();
        $controller->listChapitre();

    }elseif ($_GET['action'] === 'chapitre') {
        chapitre($_GET['id']);
        // $controller = new ChapitreController();
        // $controller->chapitre();
    }elseif ($_GET['action'] === 'admin') {
        $controller = new AdminController();
        $controller->admin();
    }
}

    $controller = new HomePageController();
    $controller->homePage();