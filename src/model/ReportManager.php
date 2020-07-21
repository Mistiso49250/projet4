<?php 
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class ReportManager
{
    private $db;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();
    }

    public function reportComment(int $idComment)
    {
        $req = $this->db->prepare('UPDATE signalement set signaler = "1" where id = ?');
        $req->execute(['idComment'=>$idComment]);
        $reportComment = $req->fetchAll();

        return $reportComment === false ? null : $reportComment;
    }

    public function insertReport()
    {
        $req = $this->db->prepare('SELECT id_chapitre, id_commentaire, pseudo, contenu from commentaire inner join on commentaire.id_chapitre = :idchapitre where commentaire.signaler = "1" ');
        $req->execute();

        return $req->fetchAll();
    }

    public function ignoreReport(int $idComment)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = "0" where id = ?');
        $req->execute(['idComment'=>$idComment]);

        return $req === false ? null : $req;
    }

}