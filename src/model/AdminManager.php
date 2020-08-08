<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class AdminManager 
{
    private $db;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();        
    }

    public function user() : ?user
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE id = :iduser');
        $query->execute([$id]);
        $user = $query->fetch();
        return $user ?: null;
    }

    public function auth(string $name): ?array
    {
        // // Vérification des identifiants
        $req = $this->db->prepare('SELECT * FROM user WHERE name = :name');
        $req->execute(['name' => $name]);
        $user = $req->fetch();

        if ($user === false) {

            return null;
        }
        return $user;
    }

    //créer un chapitre
    public function creatChapitre($titre, $contenu, $extrait, $date)
    {
        $req = $this->db->prepare('INSERT into chapitre (titre, extrait, contenu_chapitre, date_publication ) VALUES (?, ?, ?, ? NOW())');
        $newChapitre = $req->execute(['titre'=>$titre, 'contenu_chapitre'=>$contenu, 'extrait'=>$extrait, 'date'=>$date]);

        return $newChapitre;
    }

    // page : modifier un billet
    function getPostUpdate(int $idChapitre) {
        $req = $this->db->prepare('SELECT id_chapitre, titre, extrait, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idChapitre'=>$idChapitre]);

        return $req->fetch();
    }

    //modifier un chapitre
    public function updateChapitre(int $idChapitre, $titre, $extrait, $contenu) : ?array
    {
        $req = $this->db->prepare('UPDATE chapitre set titre = ?, extrait = ?, contenu_chapitre = ?, date_publication = now() where id_chapitre = :idchapitre');
        $updatechapitre = $req->execute(['idChapitre'=>$idChapitre, 'titre'=>$titre, 'contenu'=>$contenu, 'extrait'=>$extrait]);

        return $updatechapitre === false ? null : $updatechapitre;
    }

    //supprimer un chapitre
    public function deleteChapitre(int $idChapitre)
    {
        $req = $this->db->prepare('DELETE from chapitre where id = ?');

        return $req->execute(['idChapitre'=>$idChapitre]);
    }

}
