<?php
declare(strict_types=1);

use \Oc\Projet4\Model\ChapitreManager;
use \Oc\Projet4\Model\CommentaireManager;
// require_once('src/Model/ChapitreManager.php');
// require_once('src/Model/CommentaireManager.php');
require_once('src/View/View.php');

class ChapitreController 
{
    private $chapitreManager;
    private $commentaireManager;

    public function __construct() {
        $chapitreManager = new ChapitreManager();
        $chapitreManager = new CommentaireManager();
        // $this->chapitreManager = new ChapitreManager();
        // $this->commentaireManager = new CommentaireManager();
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
    

