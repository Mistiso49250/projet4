<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\View\View;


class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;
    private $view;
    
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->view = new View('../templates/frontoffice/');
    }

    public function chapitre(int $idChapitre) : void
    {
        $episode = $this->chapitreManager->findChapitre($idChapitre);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view->render('chapitre', ['episode'=>$episode, 'commentaires'=>$commentaires ]);
    }

    public function listeChapitre() : void
    {
        $list = $this->chapitreManager->findChapitres();
        $this->view->render('listechapitres', $list);
    }


    // Commentaires
    
    public function addComment(int $idChapitre, $pseudo, $contenu)
    {
        $affectedLines = $this->commentaireManager->articleComment($idChapitre, $pseudo, $contenu);
        if ($affectedLines === false){
            die('Impossible d\'ajouter le commentaire !');
        }
        else{
            header('Location: index.php?action=chapitre&id' . $idChapitre);
        }
    }

    public function viewComment($id, $commentaireManager)
    {
        $viewComment = $this->commentaireManager->updateComment($id, $commentaireManager);
        $this->view->render('viewComment', $viewComment);
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

    public function deleteComment($id, $commentaireManager)
    {
        $delete = $this->commentaireManager->updateComment($id, $commentaireManager);
        if($delete === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id);
        }
    }
}

