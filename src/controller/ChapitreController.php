<?php
declare(strict_types=1);

namespace Oc\Controller;


use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\View\View;
use Oc\Tools\Session;
use Oc\Tools\Token;

class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;
    private $view;
    private $session;
    private $getMaxId;
    private $getMinId;
    
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->view = new View('../templates/frontoffice/');
        $this->session = new Session();
        $this->getMaxId = new chapitreManager();
        $this->getMinId = new chapitreManager();
    }

    

    //affiche les informations d'un chapitre & pagination
    public function chapitre(int $idChapitre) : void
    {   
        $episode = $this->chapitreManager->findChapitre($idChapitre);
        $chapitrePrecedent = $this->getMaxId->getMaxId($episode['numchapitre']);
        $chapitreSuivant = $this->getMinId->getMinId($episode['numchapitre']);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $token = new Token($this->session);
        
        $this->view->render('chapitre', [
            'episode'=>$episode, 
            'commentaires'=>$commentaires, 
            'session'=> $this->session,
            'chapitreSuivant'=>$chapitreSuivant,
            'chapitrePrecedent'=>$chapitrePrecedent,
            'token'=>$token->genererToken()
        ]);
    }

    //affiche la liste des chapitres et pagination
    public function listeChapitre(int $currentPage = 1) /*premiere page = 1 */
    {
        $pagePrecedente = 0;
        $pageSuivante = 0;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 4;
        $offset = $postsPerPage * ($currentPage - 1);

        $countChapitre = $this->chapitreManager->countChapitre();

        $nbTotalPages = (int)ceil($countChapitre / $postsPerPage);

        if ($currentPage < 1){
            $currentPage = 1;
        }elseif ($currentPage > $nbTotalPages){
            $currentPage = $nbTotalPages;
        }

        //calculer la page précédente, si current page = 1 pas de page prec : =0
        if($currentPage === 1){ 
            $pagePrecedente = 0;
        }else {
            $pagePrecedente = $currentPage - 1;
        }

        //calculer la page suivante
        if($currentPage === $nbTotalPages){
            $pageSuivante = 0;
        }else {
            $pageSuivante = $currentPage + 1;
        }

        $list = $this->chapitreManager->findChapitres($offset, $postsPerPage);
      
        $this->view->render('listechapitres', [
            'list'=>$list, 
            'pageSuivante'=>$pageSuivante, 
            'pagePrecedente'=>$pagePrecedente, 
            'currentPage'=>$currentPage]);
    }

    
}