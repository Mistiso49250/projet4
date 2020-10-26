<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class CommentaireManager
{
    private $db;
    private $chapitreManager;

    public function __construct() {
        $this->chapitreManager = new ChapitreManager();
        $this->db = (new DbConnect())->connectToDb();
    }

    //récupère les commentaires
    public function findComments(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, signaler, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaire WHERE id_chapitre = :idchapitre ORDER BY date_commentaire DESC');
        $req->execute(['idchapitre'=>$idChapitre]);
        $comments = $req->fetchAll();

        return $comments === false ? null : $comments;
    }

    //recupère les commentaire pour la partie admin
    public function adminFindComment(int $offset, int $nbPerPage) : array
    {
        $req = $this->db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, signaler, 
                                    DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
                                     FROM commentaire ORDER BY date_commentaire DESC limit :offset, :limitation');
        $req->bindValue(':limitation', $nbPerPage, \PDO::PARAM_INT);
        $req->bindValue(':offset', $offset, \PDO::PARAM_INT);                            
        $req->execute();
        $comments = $req->fetchAll();

        return $comments === false ? null : $comments;
    }

    
    //calcul le nombre de commentaire
    public function adminCountCommentaire()
    {
        $req = $this->db->prepare('SELECT count(*) as total from commentaire');
        $req->execute();
        $total = $req->fetch();
        
        return (int)$total['total'];
    }

    //ajoute les commentaires d'un chapitre
    public function articleComment(int $idChapitre, string $pseudo, string $contenu) : bool
    {
        $comments = $this->db->prepare('INSERT into commentaire (id_chapitre, pseudo, contenu, date_commentaire) 
                                          VALUES(:idChapitre, :pseudo, :contenu, NOW())');
       
        return $comments->execute([
            'idChapitre'=>$idChapitre, 
            'pseudo'=>$pseudo, 
            'contenu'=>$contenu]);

    }

    //supprimer un commentaire
    public function deleteComment(int $idCommentaire)
    {
        $req = $this->db->prepare('DELETE from commentaire where id_commentaire = :idcommentaire');
        $req->execute(['idcommentaire'=>$idCommentaire]);
    }

    //supprimer les commentaires d'un chapitre
    public function deleteAllCommentChapter(int $idChapitre)
    {
        $req = $this->db->prepare('DELETE from commentaire where id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
    }

}