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

    //récupère les chapitres pour pagination
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
        $req = $this->db->prepare('SELECT id_chapitre, titre, numchapitre, image, contenu_chapitre, 
         DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM chapitre
          WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
        
        return $episodes === false ? null : $episodes; 
    }

    //récupère les informations d'un chapitre
    public function findChapitreAdmin(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_chapitre, titre, numchapitre, image, contenu_chapitre, publier, 
                           DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM chapitre 
                           WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
         
        return $episodes === false ? null : $episodes; 
    }


    //pagination chapitre
    //précedent
    public function getMaxId($numChapitre)
    {
        $req = $this->db->prepare('SELECT id_chapitre FROM chapitre WHERE numchapitre =
        (SELECT max(numchapitre) from chapitre where numchapitre < :numchapitre)');
        $req->execute(['numchapitre'=>$numChapitre]);
        $result = $req->fetch();

        return $result['id_chapitre'];
    }

    //suivant
    public function getMinId($numChapitre)
    {
        $req = $this->db->prepare('SELECT id_chapitre FROM chapitre WHERE numchapitre =
        (SELECT min(numchapitre) from chapitre where numchapitre > :numchapitre)');
        $req->execute(['numchapitre'=>$numChapitre]);
        $result = $req->fetch();
         
        return $result['id_chapitre'];
    }

    //calcul le nombre de chapitre
    public function countChapitre()
    {
        $req = $this->db->prepare('SELECT count(*) as total from chapitre');
        $req->execute();
        $total = $req->fetch();
        
        return (int)$total['total'];
    }
    
}