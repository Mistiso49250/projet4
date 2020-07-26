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
}