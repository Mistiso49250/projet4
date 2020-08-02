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
        $count = new PaginationManager();
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

        
        if($currentPage > 1){
            $link = "index.php?page=listeChapitre";
        }
        if($currentPage > 2) {
            $link .= '?page=' . ($currentPage - 1);
        }
        if($currentPage < $page)
        {
            
        }
       
        $this->view->render('listechapitres', ['list'=>$list, 'currentPage'=>$currentPage, 'nbPage'=>$nbPage]);
    }


}

