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

    public function findComments(int $idCommentaire) : ?array
    {
        $req = $this->db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_chapitre = :idchapitre ORDER BY date_commentaire DESC');
        $req->execute(['idchapitre'=>$idCommentaire]);
        $comments = $req->fetchAll();

        return $comments === false ? null : $comments;
    }

    public function articleComment(int $idCommentaire, $pseudo, $contenu) : ?array
    {
        $comments = $this->db->prepare('INSERT into commentaires(id_commentaire, pseudo, contenu, date_commentaire) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute([$idCommentaire, $pseudo, $contenu]);


        return $affectedLines === false ? null : $affectedLines; 
    }

    public function getComment(int $idCommentaire) : ?array
    {
        $req = $this->db->prepare('SELECT id_commentaire, pseudo, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idCommentaire]);
        $comments = $req->fetchAll();

        return $comments === false ? null : $comments;
    }

    public function updateComment(int $idCommentaire, $contenu) : ?array
    {
        $req = $this->db->prepare('UPDATE commentaires set contenu = ?, date_commentaire = now() where id_chapitre = :idchapitre');
        $newComment = $req->execute([$idCommentaire, $contenu]);

        return $newComment === false ? null : $newComment;
    }

}