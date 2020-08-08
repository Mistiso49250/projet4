<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class ChapitreManager
{
    private $db;


    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();        
      
    }

    //récupère les chapitres
    public function findChapitres(int $offset) : array
    {
        $req = $this->db->prepare('SELECT * FROM chapitre ORDER BY date_publication limit 0,6');
        $req->execute(['offset'=>$offset]);

        return $req->fetchAll();
    }

    //récupère les informations d'un chapitre
    public function findChapitre(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_chapitre, titre, image, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
        
        return $episodes === false ? null : $episodes; 
    }

    public function howPages(int $idChapitre)
    {
        $req = $this->db->prepare('SELECT id_chapitre from chapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $pages = $req->fetch();

        return $pages;
    }
    
}