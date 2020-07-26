<?php
declare(strict_types=1);

namespace Oc\Controller;

use Exception;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\Model\PaginationManager;
use Oc\Model\ReportManager;
use Oc\View\View;


class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;
    private $reportManager;
    private $view;
    
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->reportManager = new ReportManager();
        $this->view = new View('../templates/frontoffice/');

    }

    public function chapitre(int $idChapitre) : void
    {
        $episode = $this->chapitreManager->findChapitre($idChapitre);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view->render('chapitre', ['episode'=>$episode, 'commentaires'=>$commentaires ]);
    }

    public function listeChapitre() 
    {
        $list = $this->chapitreManager->findChapitres();
        $count = new PaginationManager;
        $postsPerPage = 6;

        $page = ($_GET['page'] ?? 1);
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            throw new Exception('Numéro de page invalide');
        }

        $currentPage = (int)$page;
        if ($currentPage <= 0){
            throw new Exception('Numéro de page invalide');
        }
        
        $nbPage = ceil(intval($count)/intval($postsPerPage));
        if ($currentPage > $nbPage){
            throw new Exception('Cette page n\'existe pas');
        }
        return $nbPage;
        var_dump($nbPage);die();

        $this->view->render('listechapitres', ['list'=>$list, 'currentPage'=>$currentPage, 'nbPage'=>$nbPage]);
    }

    // public function currentPage()
    // {
    //     $currentPage = (int)($_GET['page'] ?? 1);
    //     if ($currentPage <= 0){
    //         throw new Exception('Numéro de page invalide');
    //     }
    // }

    // public function getPostsPerPages($count, $postsPerPage) {
    //     $postsPerPage = 6;
    //     $nbPage = ceil($count/$postsPerPage);
    //     if ($currentPage > $nbPage){
    //         throw new Exception('Cette page n\'existe pas');
    //     }

    //     return $nbPage;
    // }

    public function newChapitre($titre, $contenu, $extrait)
    {
        $newPost = $this->chapitreManager->creatChapitre($titre, $contenu, $extrait);

        $this->view->render('newChapitre',['newPost' => $newPost]);
    }

    public function updateChapitre(int $idChapitre, $contenu)
    {
        $update = $this->chapitreManager->updateChapitre($idChapitre, $contenu);

        $this->view->render('update', ['idChapitre'=>$idChapitre, 'contenu'=>$contenu], $update);
    }

    public function deleteChapitre(int $idChapitre)
    {
        $deleteChapitre = $this->chapitreManager->deleteChapitre();
    }

}

