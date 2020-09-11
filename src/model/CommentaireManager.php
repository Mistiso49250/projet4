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
        $req = $this->db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaire WHERE id_chapitre = :idchapitre ORDER BY date_commentaire DESC');
        $req->execute(['idchapitre'=>$idChapitre]);
        $comments = $req->fetchAll();

        return $comments === false ? null : $comments;
    }

    //ajoute les commentaires d'un chapitre
    public function articleComment(int $idChapitre, string $pseudo, string $contenu) : bool
    {
        $comments = $this->db->prepare('INSERT into commentaire (id_chapitre, pseudo, contenu, date_commentaire) VALUES(:idChapitre, :pseudo, :contenu, NOW())');
       
        return $comments->execute([
            'idChapitre'=>$idChapitre, 
            'pseudo'=>$pseudo, 
            'contenu'=>$contenu]);

    }

    public function updateComment(int $idCommentaire, $contenu) : ?array
    {
        $req = $this->db->prepare('UPDATE commentaire set contenu = ?, date_commentaire = now() where id_chapitre = :idchapitre');
        $newComment = $req->execute([
            'id_commentaire'=>$idCommentaire, 
            'contenu'=>$contenu]);

        return $newComment === false ? null : $newComment;
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