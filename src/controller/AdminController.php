<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\Model\ReportManager;
use Oc\Tools\Session;
use Oc\View\View;
use Oc\Tools\Token;

class AdminController
{
    private $view;
    private $adminManager;
    private $chapitreManager;
    private $commentaireManager;
    private $reportManager;
    private $session;



    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');        
        $this->adminManager = new AdminManager(); 
        $this->chapitreManager = new ChapitreManager();   
        $this->commentaireManager = new CommentaireManager();
        $this->reportManager = new ReportManager();  
        $this->session = new Session();   
    }

    public function logout()
    {
        $this->session->logout();
        header('Location: index.php');
        exit();
    }

    public function login()
    {
        if(!isset($this->session['auth'])){
            
            header('Location: index.php?action=login');
            exit();
        }
        else{
            header('Location: index.php?action=admin');
            exit();
        }
        $this->view->render('login', null);
    }
    
    public function Admin(int $currentPage = 1)
    {
        $token = new Token($this->session);
        $verifierToken = new Token($this->session); 
       
        
        $pagePrecedente = 0;
        $pageSuivante = 0;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 5;
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

        $countReportedComments = $this->reportManager->getReportedComments();
        
       
        $this->view->render('admin', [
            'token'=>$token->genererToken(),
            'verifierToken' => $verifierToken->verifierToken(),
            'list'=>$list, 
            'session'=> $this->session,
            'pageSuivante'=>$pageSuivante, 
            'pagePrecedente'=>$pagePrecedente, 
            'currentPage'=>$currentPage, 
            'countReportedComments'=>$countReportedComments],
              null);
    }

    //créer un chapitre
    public function newChapitre($post)
    {
        $verifierToken = new Token($this->session);
        // $numChapitre = null;
        $fileName = null; 
        $countNumChapitre = $this->chapitreManager->countNumChapitre($numChapitre);
        if($verifierToken){
            // Vérifier si le formulaire a été soumis
            if($_SERVER["REQUEST_METHOD"] === "POST"){  
                // Vérifie si le fichier existe avant de le télécharger.
                if($_FILES["uploaded_file"]["name"] !=='' && file_exists("images/" . $_FILES["uploaded_file"]["name"])){ 
                    $this->session->setFlash('danger', $_FILES["uploaded_file"]["name"] . " existe déjà.");
                    header('Location: index.php?action=newChapitre');
                    exit();
                } 
                   
                elseif($countNumChapitre !== $_POST['numchapitre']){
                    $this->session->setFlash('danger', "Ce numéro de chapitre est déjà utilisé.");
                    header('Location: index.php?action=newChapitre');
                    exit();
                }
                else{
                    move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], "images/" . $_FILES["uploaded_file"]["name"]);
                    $fileName = $_FILES["uploaded_file"]["name"];
                } 
                $newPost = $this->adminManager->creatChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre'], $fileName);
                $this->session->setFlash('success', 'Votre nouveau chapitre a été publié avec succès.');
                header('Location: index.php?action=admin');
                exit();
        
            }   
        }
        else
        {
            $this->session->setToken('danger', "Une erreur c'est produite");	
        }
            

        $this->view->render('newChapitre',[
            'session'=> $this->session,
            'verifierToken' => $verifierToken->verifierToken(),
            'countReportedComments'=>$this->reportManager->getReportedComments(),
        ], null);
        

    }


    // sauvegarder un chapitre dans la bdd
    public function save($post)
    {
        
        $save = $this->adminManager->save($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre']);
        if($save === false){
            $this->session->setFlash('danger', 'Impossible de sauvegarder le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été sauvegarder.');
            header('Location: index.php?action=admin');
            exit();
        }
        $this->view->render('newChapitre',[
            'session'=> $this->session,
            'countReportedComments'=> $this->reportManager->getReportedComments(),
        ]);
    }


    //modifier un chapitre
    public function getChapitre($idChapitre)
    {
       
        $post = $this->adminManager->getPostUpdate($idChapitre);
        $countReportedComments = $this->reportManager->getReportedComments();
        $episode = $this->chapitreManager->findChapitreAdmin($idChapitre);
        

        $this->view->render('updateChapitre',[
            'post'=>$post,
            'episode'=>$episode,
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments
        ], null);
    }

    public function updateChapitre($post, $idChapitre)
    {

        $episode = $this->chapitreManager->findChapitreAdmin($idChapitre);
        $update = $this->adminManager->updateChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre'], $idChapitre);

        if($update === false){
            $this->session->setFlash('danger', 'Impossible de modifié le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été modifié.');
            header('Location: index.php?action=admin');
            exit();
        }
        
        $this->view->render('updateChapitre',[
            'post'=>$post,
            'episode'=>$episode,
            'update'=>$update,
            'session'=> $this->session,
            'countReportedComments'=>$this->reportManager->getReportedComments(),
        ]);

    }

    //supprimer un chapitre et ses commentaires
    public function deleteChapitre(int $idChapitre)
    {
        $delete = $this->adminManager->deleteChapitre($idChapitre);
        $deleteComment = $this->commentaireManager->deleteAllCommentChapter($idChapitre);

        if($delete === false){
            $deleteComment === false;
            $this->session->setFlash('danger', 'Impossible de supprimer le chapitre et ses commentaires !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre et ses commentaires on bien été supprimé.');
            header('Location: index.php?action=admin');
            exit();
        }
        
    }

    //page moderer commentaire & pagination
    public function moderateComment(int $currentPage = 1)
    {
       
        $pagePrecedente = 0;
        $pageSuivante = 0;
    
        $currentPage = (int)($_GET['page'] ?? 1);
    
        //determine le nombre d'items par page
        $postsPerPage = 10;
        $offset = $postsPerPage * ($currentPage - 1);
    
        $countComment = $this->commentaireManager->adminCountCommentaire();
    
        $nbTotalPages = (int)ceil($countComment / $postsPerPage);
    
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
    
        $list = $this->commentaireManager->adminFindComment($offset, $postsPerPage);
        
        
        $this->view->render('moderateComment',[
            'session'=> $this->session,
            'commentaires'=>$this->commentaireManager->adminFindComment($offset, $postsPerPage),
            'countReportedComments'=>$this->reportManager->getReportedComments(),
            'list'=>$list, 
            'pageSuivante'=>$pageSuivante, 
            'pagePrecedente'=>$pagePrecedente, 
            'currentPage'=>$currentPage
        ], null);
    }


    // supprimer un commentaire
    public function deleteComment(int $id_commentaire)
    {
        $delete = $this->reportManager->deleteCommentReport($id_commentaire);
        if($delete === false){
            $this->session->setFlash('danger', 'Impossible de supprimer le commentaire !');
        }
        else{
            $this->session->setFlash('success', 'Le commentaire a bien été supprimer.');

            header('Location: index.php?action=moderateComment');
            exit();
            
        }
        
    }

}


