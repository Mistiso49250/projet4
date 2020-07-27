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
        $req = $this->db->query('SELECT * FROM chapitre ORDER BY date_publication limit 0,6');

        return $req->fetchAll();
    }

    public function findChapitre(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_chapitre, titre, image, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
        
        return $episodes === false ? null : $episodes; 
    }

    public function creatChapitre($titre, $contenu, $extrait)
    {
        $req = $this->db->prepare('INSERT into chapitre (titre, extrait, contenu_chaptire, date_publication) VALUES (?, ?, NOW())');
        $newChaptire = $req->execute(['titre'=>$titre, 'contenu'=>$contenu, 'extrait'=>$extrait]);

        return $newChaptire;
    }

    public function updateChapitre(int $idChapitre, $contenu) : ?array
    {
        $req = $this->db->prepare('UPDATE chapitre set contenu_chapitre = ?, date_publication = now() where id_chapitre = :idchapitre');
        $updatechapitre = $req->execute([$idChapitre, $contenu]);

        return $updatechapitre === false ? null : $updatechapitre;
    }

    public function deleteChapitre(int $idChapitre)
    {
        $req = $this->db->prepare('DELETE FROM chapitre WHERE id = ?');

        return $req->execute(['idChapitre'=>$idChapitre]);
    }
}