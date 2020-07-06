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
    
    private $chapterModel;
    private $bookModel;
    private $commentModel;
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->view = new View('../templates/frontoffice/');
    }

    public function index($id = null)
    {
        $chapters = $this->chapterModel->getChapters();
        $chapter = $this->chapterModel->getChapterById($id);

        $data = [
        'chapters' => $chapters,
        'chapter' => $chapter,
        ];
    }

    public function listChapitre() : void
    {
        $chapitres = $this->chapitreManager->findChapitres();
        $this->view->render('listechapitres', $chapitres);
    }
    
    public function chapitre(int $idChapitre) : void // retour : void = rien
    { //$idChapitre = numerique donc devant int
        $post = $this->chapitreManager->findChapitre($idChapitre);
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view->render('chapitre', $post);
    }
}
    

