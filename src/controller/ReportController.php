<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\ReportManager;

class ReportController
{
    private $reportManager;

    public function __construct()
    {
        $this->reportManager = new ReportManager();
    }

    public function CommentReport(int $idComment)
    {
        $idComment = $_GET['id_commentaire'];
        $reported = $this->reportManager->reportComment($idComment);

        if($reported === false){
            die('Impossible de signaler le commentaire');
        }else{
            header('Location: index.php?action=chapitre&id_chapitre' . $_GET['id']);
        }
    }

    public function ignoreReportComment(int $idComment)
    {
        $ignoreReport = $this->reportManager->ignoreReport($idComment);

    }

    public function count(int $id)
    {
        $dislike = $this->db->prepare('SELECT id from signalement where id_chapitre = ?');
        $dislike->execute(['id' => $id]);
        $dislike = $dislike->rowCount();
        return $dislike === false ? null : $dislike;
    }
}