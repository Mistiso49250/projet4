<?php
declare(strict_types=1);

namespace Oc\Controller;


use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\View\View;
use Oc\Tools\Session;


class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;
    private $view;
    private $Session;
    
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->view = new View('../templates/frontoffice/');
        $this->session = new Session();

    }

    //affiche les informations d'un chapitre
    public function chapitre(int $idChapitre) : void
    {   
        $episode = $this->chapitreManager->findChapitre($idChapitre);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view->render('chapitre', [ 'episode'=>$episode, 'commentaires'=>$commentaires, 'session'=> $this->session]);
    }

    public function chapitrePagination(int $currentPage = 1)
    {
        $chapitrePrecedent = 0;
        $chapitreSuivant = 0;
        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 1;
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
            $chapitrePrecedent = 0;
        }else {
            $chapitrePrecedent = $currentPage - 1;
        }

        //calculer la page suivante
        if($currentPage === $nbTotalPages){
            $chapitreSuivant = 0;
        }else {
            $chapitreSuivant = $currentPage + 1;
        }

        $chapitrePagin = $this->chapitreManager->chapitrePagin($offset, $postsPerPage);

        $this->view->render('chapitrePagination',['chapitrePagin'=>$chapitrePagin, 'chapitreSuivant'=>$chapitreSuivant, 'chapitrePrecedent'=>$chapitrePrecedent, 'currentPage'=>$currentPage]);
    }

    //affiche la liste des chapitres et pagination
    public function listeChapitre(int $currentPage = 1) /*premiere page = 1 */
    {
        $pagePrecedente = 0;
        $pageSuivante = 0;
        // $pagePrecedente = $pagePrecedente - 1 => $pagePrecedente--;
        // $pageSuivante = $pageSuivante + 1 => $pageSuivante++;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 2;
        $offset = $postsPerPage * ($currentPage - 1);

        $countChapitre = $this->chapitreManager->countChapitre();

        $nbTotalPages = (int)ceil($countChapitre / $postsPerPage);

        //tester si la currentPage est valide
        // if(!filter_var($currentPage, FILTER_VALIDATE_INT)){
        //   throw new Exception('Numéro de page invalide');
        // if ($currentPage > $nbTotalPages){
        //         throw new Exception('Cette page n\'existe pas');
        // }
        // if ($currentPage <= 0){
        //         throw new Exception('Numéro de page invalide');
        // }
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
        // var_dump($currentPage, $offset); 
        // echo '<pre>';
        // print_r($list);
        // echo '</pre>';
        // die();
       
        $this->view->render('listechapitres', ['list'=>$list, 'pageSuivante'=>$pageSuivante, 'pagePrecedente'=>$pagePrecedente, 'currentPage'=>$currentPage]);
    }


}

