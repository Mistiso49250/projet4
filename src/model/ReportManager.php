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

    // obtenir les commentaires signalé pour les afficher dans l'administration
    public function getReportedComments()
    {
        $req = $this->db->prepare('SELECT count(*) as reported FROM commentaire WHERE signaler = 1 ORDER BY date_commentaire DESC ');
        $req->execute();
        $reported = $req->fetch();

        return (int)$reported['reported'];
    }

    //calcul le nombre de commentaire
    public function adminCountCommentaire()
    {
        $req = $this->db->prepare('SELECT count(*) as total from commentaire');
        $req->execute();
        $total = $req->fetch();
        
        return (int)$total['total'];
    }


    // modification de "signaler" de 0 à 1 pour signaler un commentaire
    public function reportComment(int $idCommentaire)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = 1 where id_commentaire = :idcommentaire');
        $reportComment = $req->execute(['idcommentaire'=>$idCommentaire]);
        
        return $reportComment;
    }
    

    // supprimer un commentaire 
    public function deleteCommentReport(int $idCommentaire)
    {
        $req = $this->db->prepare('DELETE from commentaire where id_commentaire = :idcommentaire');
        $resetComment = $req->execute([
            'idcommentaire'=>$idCommentaire]);

        return $resetComment;
    }


    // modification de "signaler" de 1 à 0 pour ignorer un commentaire
    public function ignoreReport(int $idCommentaire)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = 0 where id_commentaire = :idcommentaire');
        $req->execute(['idcommentaire'=>$idCommentaire]);

        return $req;
    }

}