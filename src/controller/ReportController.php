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
            $this->session->setFlash('danger', 'Impossible de signaler le commentaire !');
        }else{
            $this->session->setFlash('success', 'Le commentaire a bien été signalé.');
        }
        
        header('Location: index.php?action=chapitre&id=' . $idChapitre);
        exit();
        
    }


    // pour ignorer un commentaire signalé
    public function ignoreReportComment(int $idComment)
    {
        $ignoreReport = $this->reportManager->ignoreReport($idComment);
        if($ignoreReport === false){
            $this->session->setFlash('danger', 'Impossible de valider le commentaire !');
        }else{
            $this->session->setFlash('success', 'Le commentaire a bien été validé.');
        }
        
        header('Location: index.php?action=moderateComment');
        exit();

        return $ignoreReport;

    }

    
}