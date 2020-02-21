<?php
declare(strict_types=1);

require_once('src/Model/ChapitreManager.php');
require_once('src/Model/CommentaireManager.php');
require_once('src/View/View.php');

class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;

    public function __construct() {
        $this->chapitreManager = new ChapitreManager();
        $this->commentaireManager = new CommentaireManager();
    }

    public function listChapitre() {
        
        $chapitres = $this->chapitreManager->findChapitres();
        // var_dump($chapitres);die();
        render('listechapitres', $chapitres);
    }
    
    public function chapitre($idChapitre){
        
        $post = $this->chapitreManager->findChapitre($idChapitre);
        // var_dump($post); die;
        $commentaires = $this->commentaireManager->findComments($idChapitre);
    }
}
    

