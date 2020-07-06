<?php
declare(strict_types=1);

require '../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;
use Oc\Controller\AdminController;

session_start();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$action = isset($_GET['action']) ? $_GET['action'] : null;
    
switch ($action) {
    case 'listchapitre':
        $controller = new ChapitreController();
        $controller->listChapitre();
    break;
    case 'chapitre':
        $controller = new ChapitreController();
        $controller->chapitre((int)$_GET['id']);
    break;
    case 'login':
        $controller = new HomePageController();
        $controller->login();
    break;
    case 'admin':
        $controller = new AdminController();
        $controller->admin();
    break;
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
    break;
    default:
        $controller = new HomePageController();
        $controller->homePage();
}

    