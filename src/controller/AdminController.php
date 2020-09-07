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
    
    public function Admin()
    {
        $currentPage = (int)($_GET['page'] ?? 1);
        $postsPerPage = 7;
        $offset = $postsPerPage * ($currentPage - 1);

        $list = $this->chapitreManager->adminListChapitres();
        // $commentaires = $this->commentaireManager->findComments($idChapitre);
       
        $this->view->render('admin', ['list'=>$list], /*$commentaires,*/ null);
    }

    //créer un chapitre
    public function newChapitre($post)
    {
        if(isset($post['titre']) ){
            $newPost = $this->adminManager->creatChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['image']);
            $newImage = $this->adminManager->addImage();
            header('Location: index.php?action=admin');
            exit;
        }
        
        $this->view->render('newChapitre', null);
        
    }

    //modifier un chapitre
    public function getChapitre($idChapitre)
    {
        $post = $this->adminManager->getPostUpdate($idChapitre);
        // var_dump($post); 
        // echo '<pre>';
        // print_r($post);
        // echo '</pre>';
        // die();

        $this->view->render('updateChapitre',['post'=>$post], null);
    }

    public function updateChapitre($post, $idChapitre)
    {
        $update = $this->adminManager->updateChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $idChapitre);
        
        if($update === false){
            // $this->session->setFlash('danger', 'Impossible de modifié le chapitre !');
            $_SESSION['flash']['danger'] = 'Impossible de modifié le chapitre !';
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été modifié.');
            $_SESSION['flash']['success'] = 'Le chapitre à bien été modifié.';
        }
        
        header('Location: index.php?action=admin');
        exit();

    }

    //supprimer un chapitre et ses commentaires
    public function deleteChapitre(int $idChapitre)
    {
        $delete = $this->adminManager->deleteChapitre($idChapitre);
        $deleteComment = $this->commentaireManager->deleteAllCommentChapter($idChapitre);

        if($delete === false){
            $deleteComment === false;
            // $this->session->setFlash('danger', 'Impossible de supprimer le chapitre et ses commentaires !');
            $_SESSION['flash']['danger'] = 'Impossible de supprimer le chapitre et ses commentaires !';
        }
        else{
            // $this->session->setFlash('success', 'Le chapitre et ses commentaires on bien été supprimé.');
            $_SESSION['flash']['success'] = 'Le chapitre et ses commentaires on bien été supprimé.';
        }

        header('Location: index.php?action=admin');
        exit();
    }

    //page moderer commentaire
    public function moderateComment()
    {
        $this->view->render('moderateComment', null);
    }

    // supprimer un commentaire signalé
    public function deleteComment(int $id_commentaire, $commentaireManager)
    {
        $delete = $this->reportManager->deleteCommentReport($id_commentaire, $commentaireManager);
        if($delete === false){
            // $this->session->setFlash('danger', 'Impossible de supprimer le commentaire !');
            $_SESSION['flash']['danger'] = 'Impossible de supprimer le commentaire';
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
        }
        header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        exit();
    }

    public function editComment($id_commentaire, $commentaireManager)
    {
        $edit = $this->commentaireManager->updateComment($id_commentaire, $commentaireManager);
        if($edit === false){
            // $this->session->setFlash('danger', 'Impossible de modifier le commentaire !');
            $_SESSION['flash']['danger'] = 'Impossible de modifier le commentaire';
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
        }
        header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        exit();
    }
}