<?php
declare(strict_types=1);

namespace Oc\Controller;

use Exception;
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
        // $this->findById = $this->chapitreManager->findChapitres($_GET['id_chapitre']);
    }

    public function chapitre()
    {
        $episode = $this->chapitreManager->find($_GET['id_chapitre']);
        $this->view->render('chapitre', ['episode'=>$episode]);
    }

    public function listeChapitre()
    {
        $list = $this->chapitreManager->findAll();
        $this->view->render('list', $list);
    }

    // public function findByIdChapitre(int $idChapitre)
    // {
    //     $findById = $this->chapitreManager->findChapitre($idChapitre);
    //     $this->view->render('findChapitre', $findById);
    // }

    // public function listChapitre() : void
    // { 
    //     $chapitres = $this->chapitreManager->findChapitres(); 
    //     $this->view->render('listechapitres', $chapitres);
    // }
    
    // public function chapitre(int $idChapitre) : void // retour : void = rien
    // { //$idChapitre = numerique donc devant int
    //     $episodes = $this->chapitreManager->findChapitre($idChapitre);
    //     $commentaires = $this->commentaireManager->findComments($idChapitre);
    //     $this->view->render('chapitre', ['episode'=>$episodes,'commentaires'=>$commentaires]);
    // }

    // public function addComment(int $idCommentaire, $pseudo, $contenu)
    // {
    //     $affectedLines = $this->commentaireManager->articleComment($idCommentaire, $pseudo, $contenu);
    //     if ($affectedLines === false){
    //         throw new Exception('Impossible d\'ajouter le commentaire !');
    //     }
    //     else{
    //         header('Location: index.php?action=chapitre&id' . $idCommentaire);
    //     }
    // }

    // public function viewComment()
    // {
    //     $viewComment = $this->commentaireManager->updateComment($id, $commentaireManager);
    //     $this->view->render('viewComment', $viewComment);
    // }

    // public editComment($id, $commentaireManager)
    // {
    //     $edit = $this->commentaireManager->updateComment($id, $commentaireManager);
    //     if($edit === false){
    //         throw new Exception('Impossible de modifier le commentaire');
    //     }
    //     else{
    //         echo 'commentaire: ' . $_POST['comment'];
    //         header('Location: index.php?action=commentaire&id=' . $id);
    //     }
    // }

}

