<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Tools\Session;
use Oc\Model\ReportManager;
use Oc\View\View;

class ReportController
{
    private $reportManager;
    private $view;
    private $session;

    public function __construct()
    {
        $this->reportManager = new ReportManager();
        $this->session = new Session();
        $this->view = new View('../templates/frontoffice/');
    }

    // signaler un commentaire
    public function commentReport(int $idCommentaire, int $idChapitre)
    {
        
        $reported = $this->reportManager->reportComment($idCommentaire);
        if($reported === false){
            $_SESSION['flash']['danger'] = 'Impossible de signaler le commentaire.';
        }else{
            $_SESSION['flash']['success'] = 'Le commentaire a bien été signalé.';
        }
        
        header('Location: index.php?action=chapitre&id=' . $idChapitre);
        exit();
        
    }

    //cacher un commentaire signalé
    public function hiddenComment(int $idCommentaire)
    {
        $hidden = $this->reportManager->hiddenComment($idCommentaire);

        $this->view->render('hiddenComment', ['hidden'=>$hidden]);
    }

    // pour ignorer un commentaire signalé
    public function ignoreReportComment(int $idComment)
    {
        $ignoreReport = $this->reportManager->ignoreReport($idComment);

        return $ignoreReport;

    }

    // public function count(int $id)
    // {
    //     $dislike = $this->db->prepare('SELECT id from signalement where id_chapitre = ?');
    //     $dislike->execute(['id' => $id]);
    //     $dislike = $dislike->rowCount();
    //     return $dislike === false ? null : $dislike;
    // }

    
}