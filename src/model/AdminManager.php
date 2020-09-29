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
    public function creatChapitre($titre, $contenu, $extrait, $numchapitre)
    {
        $req = $this->db->prepare('INSERT into chapitre (titre, contenu_chapitre, extrait, publier, numchapitre, date_publication) 
                                                 VALUES (:titre, :contenu_chapitre, :extrait, 1, :numchapitre, NOW())');
        $newChapitre = $req->execute([
            'titre'=>$titre, 
            'contenu_chapitre'=>$contenu, 
            'extrait'=>$extrait, 
            'numchapitre'=>$numchapitre
            ]);

        return $newChapitre;
    }

    //créer un chapitre
    public function testChapitre()
    {
        $req = $this->db->prepare('INSERT into chapitre (titre, contenu_chapitre, extrait, image, publier, numchapitre, date_publication) 
                                                 VALUES ("' . ($_POST['titre']) . '", "' . ($_POST['contenu_chaptire']) . '", "' . ($_POST['extrait']) . '", "' . ($_FILES['img']['name']) . '",
                                                   "'. 1 .'" ,"' . ($_POST['numchapitre']) . '", NOW())');
        $newChapitre = $req->execute();
        return $newChapitre;
    }

    //ajouter une image
    public function addImage()
    {
        $req = $this->db->prepare('INSERT into images (image)');
        $req->execute();

        return $req->fetch();
    }

    // sauvegarde des chapitre en cours dans la bdd
    public function save($titre, $contenu, $extrait, $numchapitre)
    {
        $req = $this->db->prepare('INSERT into chapitre (titre, contenu_chapitre, extrait, publier, numchapitre, date_publication ) 
                                                 VALUES (:titre, :contenu_chapitre, :extrait, 0, :numchapitre,  NOW())');
        $newChapitre = $req->execute([
            'titre'=>$titre, 
            'contenu_chapitre'=>$contenu, 
            'extrait'=>$extrait, 
            'numchapitre'=>$numchapitre 
            ]);

        return $newChapitre;
    }

    // page : modifier un billet
    function getPostUpdate(int $idChapitre) {
        $req = $this->db->prepare('SELECT id_chapitre, titre, extrait, contenu_chapitre, numchapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);

        return $req->fetch();
    }

    //modifier un chapitre
    public function updateChapitre($titre, $extrait, $contenu, $idChapitre) : bool
    {
        $req = $this->db->prepare('UPDATE chapitre set titre = :titre, contenu_chapitre = :contenu_chapitre, extrait = :extrait, publier = 1, where id_chapitre = :idchapitre');
        $updatechapitre = $req->execute([
            'titre'=>$titre, 
            'contenu_chapitre'=>$contenu, 
            'extrait'=>$extrait, 
            'idchapitre'=>$idChapitre]);

        return $updatechapitre;
    }

    //supprimer un chapitre
    public function deleteChapitre(int $idChapitre)
    {
        $req = $this->db->prepare('DELETE from chapitre where id_chapitre = :idchapitre');

        return $req->execute(['idchapitre'=>$idChapitre]);
    }

}
