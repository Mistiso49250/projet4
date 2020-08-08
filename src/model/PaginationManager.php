<?php
declare(strict_types=1);

namespace Oc\Model;

use Exception;
use Oc\Tools\DbConnect;


class PaginationManager
{
    private $db;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();
    }

    public function count(int $idChapitre) {
        $req = $this->db->query('SELECT COUNT(id_chapitre) from chapitre');
        $req->execute(['idChapitre'=>$idChapitre]);
        $nbPosts = $req->fetch();

        return $nbPosts;
    }

    public function getPostsPerPages($page, $currentPage, $nbPage)
    {
        $postsPerPage = 6;

        $page = ($_GET['page'] ?? 1);
        if(!filter_var($page, FILTER_VALIDATE_INT)){
            throw new Exception('Numéro de page invalide');
        }

        $currentPage = (int)$page;
        if ($currentPage <= 0){
            throw new Exception('Numéro de page invalide');
        }
        
        $nbPage = ceil(intval($this->count)/intval($postsPerPage));
        if ($currentPage > $nbPage){
            throw new Exception('Cette page n\'existe pas');
        }
        return $nbPage;
    }


}