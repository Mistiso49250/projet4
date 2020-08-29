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

    //  modification de "signaler" de 0 à 1 pour signaler un commentaire
    public function reportComment(int $idComment)
    {
        $req = $this->db->prepare('UPDATE signalement set signaler = "1" where id = ?');
        $req->execute(['idComment'=>$idComment]);
        $reportComment = $req->fetchAll();

        return $reportComment;
    }

    // faire une jointure des tables pour pouvoir afficher les informations dans l'administration
    public function insertReport()
    {
        $req = $this->db->prepare('SELECT id_chapitre, id_commentaire, pseudo, contenu from commentaire inner join on commentaire.id_chapitre = :idchapitre where commentaire.signaler = "1" ');
        $req->execute();

        return $req->fetchAll();
    }

     // modification de "signaler" de 1 à 0 pour ignorer un commentaire
    public function ignoreReport(int $idComment)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = "0" where id = ?');
        $req->execute(['idComment'=>$idComment]);

        return $req === false ? null : $req;
    }

    public function deleteComment(int $idComment)
    {
        $req = $this->db->prepare('DELETE from commentaire where id_commentaire = ?');

        return $req->execute(['idComment'=>$idComment]);
    }

}