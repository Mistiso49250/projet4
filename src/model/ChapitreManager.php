<?php
declare(strict_types=1);

namespace Oc\Projet4\Model;

class ChapitreManager extends Manager
{
    private $db;

    public function __construct(){
        
        $this->db = new DbConnect();        
        
    }

    public function findChapitres()
    {
        
        $req = $this->db->query('SELECT * FROM chapitre ORDER BY date_publication DESC ');


        return $req->fetchAll();
    }

    public function findChapitre($postId)
    {
        
        $req = $this->db->prepare('SELECT id_chapitre, titre, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, images FROM posts WHERE id = :idchapitre');
        $req->execute(['idchapitre'=>$postId]);
        $post = $req->fetch();

        return $post;
    }

}