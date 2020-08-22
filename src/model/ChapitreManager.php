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
    public function findChapitres(int $offset, int $nbPerPage) : array
    {
        $req = $this->db->prepare('SELECT * FROM chapitre ORDER BY date_publication limit :offset, :limitation');
        $req->bindValue(':limitation', $nbPerPage, \PDO::PARAM_INT);
        $req->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll();
    }

    //récupère les chapitres pour la partie admin
    public function adminListChapitres()
    {
        $req = $this->db->prepare('SELECT * FROM chapitre ORDER BY date_publication');
        $req->execute();

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

    public function countChapitre()
    {
        $req = $this->db->prepare('SELECT count(*) as total from chapitre');
        $req->execute();
        $total = $req->fetch();
        
        return (int)$total['total'];
    }
    
}