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
    // partie front
        // page liste des chapitre
    case 'listchapitre':
        $controller = new ChapitreController();
        $controller->listeChapitre();
    break;
        // page chaptire
    case 'chapitre':
        $controller = new ChapitreController();
        $controller->chapitre((int)$_GET['id']);
    break;
        // ajout de commentaire
    case 'addComment':
        $controller = new CommentaireController();
        $controller->addComment((int)$_GET['id'], $_POST['pseudo'], $_POST['contenu']);
    break;
        // signalement d'un commentaire
    case 'commentReport':
        $controller = new ReportController();
        $controller->commentReport((int)$_GET['id'], (int)$_GET['chapitre_id']);
    break;
    // partie admin
    // connexion à la partie admin
    case 'login':
        $controller = new HomePageController();
        $controller->login();
    break;
    case 'admin':
        $controller = new AdminController();
        $controller->admin();
    break;
    // déconnexion de la partie admin
    case 'logout':
        $controller = new AdminController();
        $controller->logout();
    break;
    // création, modification et suppression d'un chapitre
    // avec upload d'images
    case 'newChapitre':
        $controller = new AdminController();
        $controller->newChapitre($_POST);
    break;
    case 'updateChapitre':
        $controller = new AdminController();
        $controller->updateChapitre($_POST, (int)$_GET['id_chapitre']);
    break;
    case 'deleteChapitre':
        $controller = new AdminController();
        $controller->deleteChapitre((int)$_GET['id_chapitre']);
    break;
    case 'uploadImg':
        $controller = new ChapitreController();
        $cotroller->uploadImg();
    break;
    // sauvegarder un chapitre en brouillon
    case 'save':
        $controller = new AdminController();
        $controller->save($_POST);
    break;
    // page modification chapitre
    case 'getPostUpdate':
        $controller = new AdminController();
        $controller->getChapitre((int)$_GET['id_chapitre']);
    break;
    // page moderation commentaires
    case 'moderateComment':
        $controller = new AdminController();
        $controller->moderateComment();
    break;
    // suppression commentaires signalé
    case 'deleteComment':
        $controller = new AdminController();
        $controller->deleteComment((int)$_GET['id']);
    break;
    // autoriser un commentaire signalé
    case 'ignoreReportComment':
        $controller = new ReportController();
        $controller->ignoreReportComment((int)$_GET['id']);
    break;
    // page d'accueil
    default:
        $controller = new HomePageController();
        $controller->homePage();
}