<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\CommentaireManager;

class CommentaireController
{
    private $commentaireManager;
    
    public function __construct()
    {
        $this->commentaireManager = new CommentaireManager();
    }
    
    public function addComment(int $idChapitre, $pseudo, $contenu)
    {
        $affectedLines = $this->commentaireManager->articleComment($idChapitre, $pseudo, $contenu);
        var_dump($affectedLines);die();
        if ($affectedLines === false){
            die('Impossible d\'ajouter le commentaire !');
        }
        elseif(!empty('pseudo') && !empty('contenu')){
                die('Tout les champs ne sont pas remplis');
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
        $delete = $this->commentaireManager->deleteComment($id, $commentaireManager);
        if($delete === false){
            die('Impossible de modifier le commentaire');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
            header('Location: index.php?action=commentaire&id=' . $id);
        }
    }

    
}