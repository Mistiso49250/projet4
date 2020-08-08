<?php
declare(strict_types=1);

namespace Oc\Controller;

use Exception;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
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

    //affiche les informations d'un chapitre
    public function chapitre(int $idChapitre) : void
    {
        $episode = $this->chapitreManager->findChapitre($idChapitre);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view->render('chapitre', ['episode'=>$episode, 'commentaires'=>$commentaires ]);
    }

    //affiche la liste des chapitres et pagination
    public function listeChapitre(int $currentPage = 1) /*premiere page = 0 */
    {

       $offset = $currentPage * 6;
        
        $list = $this->chapitreManager->findChapitres($offset);
        // var_dump($list);die();

        //determine le nombre d'items par page
        $postsPerPage = 6;

        //déterminer le numéro de page à partir de $_GET
        $page = ($_GET['page'] ?? 1);
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            throw new Exception('Numéro de page invalide');
        }if ($currentPage <= 0){
            throw new Exception('Numéro de page invalide');
        }else {
            $nbPage = (int)ceil($currentPage / $postsPerPage);
            if ($currentPage > $nbPage){
                throw new Exception('Cette page n\'existe pas');
            }
        }
        
        
        if($currentPage > 1){
            $link = "index.php?page=listeChapitre";
        }
        if($currentPage > 2) {
            $link .= '?page=' . ($currentPage - 1);
        }
        if($currentPage < $page)
        {
            
        }
       
        $this->view->render('listechapitres', ['list'=>$list, /*'pageSuivante' pagePrecedente */'currentPage'=>$currentPage, 'nbPage'=>0]);
    }


}

