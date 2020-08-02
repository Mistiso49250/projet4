<?php
declare(strict_types=1);

require '../vendor/autoload.php';

use Oc\Controller\HomePageController;
use Oc\Controller\ChapitreController;
use Oc\Controller\AdminController;
use Oc\Controller\CommentaireController;

session_start();

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
    case 'updateChapitre':
        $controller = new AdminController();
        $controller->updateChapitre((int)$_GET['id'], $titre, $extrait, $contenu);
    break;
    case 'moderateComment':
        $controller = new AdminController();
        $controller->editComment($id, $commentaireManager);
    case 'addComment':
        $controller = new CommentaireController();
        $controller->addComment((int)$_GET['id'], $_POST['pseudo'], $_POST['contenu']);
    break;
    case 'deleteComment':
        $controller = new AdminController();
        $controller->deleteComment($id, $commentaireManager);
    break;
    case 'editComment':
        $controller = new AdminController();
        $controller->editComment($id, $commentaireManager);
    break;
    default:
        $controller = new HomePageController();
        $controller->homePage();
}