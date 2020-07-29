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
            $newPost = $this->adminManager->creatChapitre($post['titre'], $post['contenu'], $post['extrait']);

            header('Location: index.php?action=admin');
            exit;
        }
        
        $this->view->render('newChapitre', null);
        
    }

    public function updateChapitre($idChapitre, $titre, $extrait, $contenu)
    {
        var_dump('toto'); die();
        $update = $this->adminManager->updateChapitre($titre, $extrait, $contenu, $idChapitre);

        header('Location: index.php?action=admin');

        $this->view->render('updateChaptire', ['update'=>$update, 'titre'=>$titre, 'extrait'=>$extrait, 'contenu'=>$contenu]);
    }

    public function deleteChapitre(int $idChapitre)
    {
        
    }

    public function updateComment()  
    {
        
    }

    public function deleteComment($id_commentaire, $commentaireManager)
    {
        $delete = $this->commentaireManager->deleteComment($id_commentaire, $commentaireManager);
        if($delete === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        }
    }

    public function editComment($id_commentaire, $commentaireManager)
    {
        $edit = $this->commentaireManager->updateComment($id_commentaire, $commentaireManager);
        if($edit === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        }
    }
}