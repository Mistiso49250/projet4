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

    public function findChapitres() : array
    {
        $req = $this->db->query('SELECT * FROM chapitre ORDER BY date_publication');

        return $req->fetchAll();
    }

    public function findChapitre(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_chapitre, titre, image, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
        
        return $episodes === false ? null : $episodes; 
    }

    public function updateChapitre(int $idChaptire, $contenu) : ?array
    {
        $req = $this->db->prepare('UPDATE chaptire set contenu_chapitre = ?, date_publication = now() where id_chapitre = :idchapitre');
        $newchaptire = $req->execute([$idChaptire, $contenu]);

        return $newchaptire === false ? null : $newchaptire;
    }

}