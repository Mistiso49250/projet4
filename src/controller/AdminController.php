<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\Model\ReportManager;
use Oc\Tools\Session;
use Oc\View\View;

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
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function login()
    {
        if(!isset($_SESSION['auth'])){
            header('Location: index.php?action=login');

            exit();
        }
        $this->view->render('login', null);
    }
    
    public function Admin(int $currentPage = 1)
    {
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
 
        // Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $maxSize = 400000;
            $validExt = array('.jpg', '.jpeg', '.gif', '.png');
            $fileSize = $_FILES['uploaded_file']['size'];
            $fileNAme = $_FILES['uploaded_file']['name'];
            $fileExt = "." .strtolower(substr(strrchr($fileNAme, '.'), 1));
            $tmpName = $_FILES['uploaded_file']['name'];
            $uniqueName = md5(uniqid(rand()), true);

            $fileNAme = "images/" . $uniqueName . $fileExt;

            $result = move_uploaded_file($tmpName, $fileNAme);
 
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("images/" . $fileNAme)){ 
                $this->session->setFlash('danger', $fileNAme . " existe déjà.");
            }
            if($fileSize > $maxSize){
                $this->session->setFlash('danger', 'le fichier est trop volumieux');
            } 

            if(in_array($fileSize, $validExt))
            {
                $this->session->setFlash('danger', 'le format n\'est pas valide');
            }

            if($result)
            {
                $this->session->setFlash('success', 'upload réussi.');
            }

            // Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] === "POST"){  

            $filename = null; 
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("images/" . $_FILES["uploaded_file"]["name"])){ 
                $this->session->setFlash('danger', 'Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.');
                $this->session->setFlash('danger', $_FILES["uploaded_file"]["name"] . " existe déjà.");
            } 
            else{
                move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], "images/" . $_FILES["uploaded_file"]["name"]);
                $filename = $_FILES["uploaded_file"]["name"];
            } 

               $newPost = $this->adminManager->creatChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre'], $filename);
                    $this->session->setFlash('success', 'Votre nouveau chapitre a été publié avec succès.');
                    header('Location: index.php?action=admin');
                    exit();
           
        }

        }

        $this->view->render('newChapitre',[
            'session'=> $this->session,
            'countReportedComments'=>$this->reportManager->getReportedComments(),
        ], null);
        

    }

   
    

    // sauvegarder un chapitre dans la bdd
    public function save($post)
    {
        $countReportedComments = $this->reportManager->getReportedComments();

        $save = $this->adminManager->save($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre']);
        if($save === false){
            $this->session->setFlash('danger', 'Impossible de sauvegarder le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été sauvegarder.');
            header('Location: index.php?action=admin');
            exit();
        }
        $this->view->render('save',[
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments,
            
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
        $update = $this->adminManager->updateChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $idChapitre);
        $countReportedComments = $this->reportManager->getReportedComments();

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
            'countReportedComments'=>$countReportedComments
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

    //page moderer commentaire
    public function moderateComment(int $currentPage = 1)
    {
        $pagePrecedente = 0;
        $pageSuivante = 0;
        // $pagePrecedente = $pagePrecedente - 1 => $pagePrecedente--;
        // $pageSuivante = $pageSuivante + 1 => $pageSuivante++;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 10;
        $offset = $postsPerPage * ($currentPage - 1);

        $countComment = $this->reportManager->adminCountCommentaire();

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

        $list = $this->commentaireManager->findCommentPagin($offset, $postsPerPage);

        $commentaires = $this->commentaireManager->adminFindComment();
        $countReportedComments = $this->reportManager->getReportedComments();
        
        $this->view->render('moderateComment',[
            'session'=> $this->session,
            'commentaires'=>$commentaires,
            'countReportedComments'=>$countReportedComments,
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


