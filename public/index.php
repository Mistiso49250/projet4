<?php
declare(strict_types=1);

require'../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;
use Oc\Controller\AdminController;

session_start();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listchapitre') {
        $controller = new ChapitreController();
        $controller->listChapitre();

    }elseif ($_GET['action'] === 'chapitre') {
        chapitre($_GET['id']);
        // $controller = new ChapitreController();
        // $controller->chapitre();
    }elseif ($_GET['action'] === 'login') {
        $controller = new HomePageController();
        $controller->login();
    }elseif ($_GET['action'] === 'admin') {
        // $controller = new HomePageController();
        // $controller->login();
        var_dump('admin');die();
    }
}

    $controller = new HomePageController();
    $controller->homePage();
    