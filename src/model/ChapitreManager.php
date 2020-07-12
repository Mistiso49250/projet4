<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class ChapitreManager
{
    private $db;
    public $id;
    public $title;
    public $content;
    public $img;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();        
        $this->id=0;
        $this->title="article";
        $this->content="Contenu chapitre";
        $this->image="image";
    }

    public function setId($id) {
		return $this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setTitle($title) {
		return $this->title = $title;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setContent($content) {
		return $this->content = $content;
	}

	public function getContent() {
		return $this->content;
    }

    public function find(int $idChapitre) : ?array
    {
        $req = $this->db->prepare('SELECT id_chapitre, titre, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
        $req->execute(['idchapitre'=>$idChapitre]);
        $episodes = $req->fetch();
        
        return $episodes === false ? null : $episodes; 
    }

    public function findAll()
    {
        $req = $this->db->query('SELECT * FROM chapitre ORDER BY date_publication ');

        return $req->fetchAll();
    }
    
    // public function find($id)
    // {
    //     if( !is_int($id)) trigger_error('Appel non conforme');
    //     $req = $this->db->prepare('SELECT id_chapitre, titre, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
    //     $statement = $this->db->prepare($req);
    //     $posts = $statement->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, __CLASS__);
    //     $count = $statement->rowCount();
    //     if ($count !== 1){
    //         return false;
    //     }else {
    //         return $posts[0];
    //     }
    // }

    // public function findAll()
    // {
    //     $req = $this->db->query('SELECT * FROM chapitre order by date_publication desc');
    //     $statement = $this->db->query($req);
    //     $posts = $statement->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, __CLASS__);
    //     $count = $statement->rowCount();
    //     if ($count !== 1){
    //         return false;
    //     }else {
    //         return $posts[0];
    //     }
    // }

    // public function findChapitres() : array// retour = tableau    ?array = findChapitre va renvoyer null ou un tableau
    // {
    //     $req = $this->db->query('SELECT * FROM chapitre ORDER BY date_publication DESC ');

    //     return $req->fetchAll();
    // }

    // public function findChapitre(int $idChapitre) : ?array
    // {
    //     $req = $this->db->prepare('SELECT id_chapitre, titre, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, image FROM chapitre WHERE id_chapitre = :idchapitre');
    //     $req->execute(['idchapitre'=>$idChapitre]);
    //     $episodes = $req->fetch();
        
    //     return $episodes === false ? null : $episodes; 
    // }

    

}