<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\Model\ReportManager;
use Oc\View\View;


class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;
    private $reportManager;
    private $view;
    
    public function __construct() 
    {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
        $this->reportManager = new ReportManager();
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


    
}

