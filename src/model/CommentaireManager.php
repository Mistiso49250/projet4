<?php
declare(strict_types=1);

class CommentaireManager 
{
    private $db;
    private $chapitreManager;

    public function __construct() {
        $this->chapitreManager = new ChapitreManager();
        $this->db = new DbConnect();
    }

    public function findComments($postId)
    {
        $comments = $this->db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE post_id = :idchapitre ORDER BY date_commentaire DESC');
        $comments->execute(['idchapitre'=>$postId]);

        return $comments;
    }

}