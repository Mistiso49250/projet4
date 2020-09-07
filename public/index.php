<?php
declare(strict_types=1);

require '../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;
use Oc\Controller\AdminController;
use Oc\Controller\CommentaireController;
use Oc\Controller\ReportController;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'listchapitre':
        $controller = new ChapitreController();
        $controller->listeChapitre();
    break;
    case 'chapitre':
        $controller = new ChapitreController();
        $controller->chapitre((int)$_GET['id']);
    break;
    case 'commentReport':
        $controller = new ReportController();
        $controller->commentReport((int)$_GET['id'], (int)$_GET['chapitre_id']);
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
    case 'newChapitre':
        $controller = new AdminController();
        $controller->newChapitre($_POST);
    break;
    case 'getPostUpdate':
        $controller = new AdminController();
        $controller->getChapitre((int)$_GET['id_chapitre']);
    break;
    case 'updateChapitre':
        $controller = new AdminController();
        $controller->updateChapitre($_POST, (int)$_GET['id_chapitre']);
    break;
    case 'deleteChapitre':
        $controller = new AdminController();
        $controller->deleteChapitre((int)$_GET['id_chapitre']);
    break;
    case 'moderateComment':
        $controller = new AdminController();
        $controller->moderateComment();
    // case 'moderateComment':
    //     $controller = new AdminController();
    //     $controller->editComment($id, $commentaireManager);
    // break;
    case 'addComment':
        $controller = new CommentaireController();
        $controller->addComment((int)$_GET['id'], $_POST['pseudo'], $_POST['contenu']);
    break;
    case 'deleteComment':
        $controller = new AdminController();
        $controller->deleteComment((int)$_GET['id'], $commentaireManager);
    break;
    default:
        $controller = new HomePageController();
        $controller->homePage();
}