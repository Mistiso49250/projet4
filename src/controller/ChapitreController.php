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
    }

    public function listChapitre()
    {
        $chapitres = $this->chapitreManager->findChapitres();
        $this->view = render('listechapitres', $chapitres);
    }
    
    public function chapitre(int $idChapitre) : void // retour : void = rien
    { //$idChapitre = numerique donc devant int
        
        $post = $this->chapitreManager->findChapitre($idChapitre);
        // var_dump($post); die;
        $commentaires = $this->commentaireManager->findComments($idChapitre);
        $this->view = render('chapitres', $post);
        
    }
}
    

