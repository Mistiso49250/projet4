<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\View\View;

class AdminController
{
    private $view;
    private $adminManager;
    private $chapitreManager;
    private $commentaireManager;



    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');        
        $this->adminManager = new AdminManager(); 
        $this->chapitreManager = new ChapitreManager();   
        $this->commentaireManager = new CommentaireManager();     
    }

    public function logout()
    {
        exit();
    }

    
    public function Admin(/*int $idChapitre*/)
    {
        $list = $this->chapitreManager->findChapitres();
        // $commentaires = $this->commentaireManager->findComments($idChapitre);
        if(!isset($_SESSION['auth'])){
            header('Location: index.php?action=login');

            exit();
        }
        $this->view->render('admin', $list, /*$commentaires,*/ null);
    }

    public function newChapitre($post)
    {
        if(isset($post['titre']) ){
            $newPost = $this->chapitreManager->creatChapitre($post['titre'], $post['contenu'], $post['extrait']);

            header('Location: index.php?action=admin');
            exit;
        }
        
        $this->view->render('newChapitre', null);
        
    }

    public function updateChapitre(int $idChapitre, $contenu)
    {
        $update = $this->chapitreManager->updateChapitre($idChapitre, $contenu);

        $this->view->render('update', ['idChapitre'=>$idChapitre, 'contenu'=>$contenu], $update);
    }

    public function deleteChapitre(int $idChapitre)
    {
        
    }

    public function updateComment()  
    {
        
    }

    public function deleteComment($id, $commentaireManager)
    {
        $delete = $this->commentaireManager->deleteComment($id, $commentaireManager);
        if($delete === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id);
        }
    }

    public function editComment($id, $commentaireManager)
    {
        $edit = $this->commentaireManager->updateComment($id, $commentaireManager);
        if($edit === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id);
        }
    }
}