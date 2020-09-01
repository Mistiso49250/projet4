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

    // obtenir les commentaires signalé
    public function getReportedComments()
    {
        $req = $this->db->prepare('SELECT id_commentaire, pseudo, contenu,  date_format(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaire WHERE signaler = 1 ORDER BY date_commentaire DESC ');
        $commentsReport = $req->execute();

        return $commentsReport;
    }

    // modification de "signaler" de 0 à 1 pour signaler un commentaire
    public function reportComment(int $idCommentaire)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = 1 where id_commentaire = :idcommentaire');
        $reportComment = $req->execute(['idcommentaire'=>$idCommentaire]);
        
        return $reportComment;
    }
 
    // faire une jointure des tables pour pouvoir afficher les informations dans l'administration
    public function insertReport()
    {
        $req = $this->db->prepare('SELECT id_chapitre, id_commentaire, pseudo, contenu from commentaire inner join on commentaire.id_chapitre = :idchapitre where commentaire.signaler = "1" ');
        $req->execute();
 
        return $req->fetchAll();
    }

    // supprimer un commentaire signalé
    public function deleteCommentReport(int $idCommentaire, $contenu)
    {
        $req = $this->db->prepare('DELETE from commentaire set contenu = ?, where id_chapitre = :idchapitre');
        $resetComment = $req->execute([
            'id_commentaire'=>$idCommentaire, 
            'contenu'=>$contenu]);

        return $resetComment;
    }

    public function hiddenComment(int $idCommentaire)
    {
        $req = $this->db->prepare('UPDATE commetaire set hidden_com = 1, signaler = 0, hidden_by = ?, hidden_date = NOW() WHERE id = :idcommentaire');
        $req->execute(['idcommentaire'=>$idCommentaire]);
    }

     // modification de "signaler" de 1 à 0 pour ignorer un commentaire
    public function ignoreReport(int $idComment)
    {
        $req = $this->db->prepare('UPDATE commentaire set signaler = "0" where id = :idcommentaire');
        $req->execute(['idcommentaire'=>$idComment]);

        return $req;
    }

}