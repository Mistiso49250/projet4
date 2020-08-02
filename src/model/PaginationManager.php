<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;


class PaginationManager
{
    private $db;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();
    }

    public function count(int $idChapitre) {
        $req = $this->db->query('SELECT COUNT(id) from chapitre');
        $req->execute(['idChapitre'=>$idChapitre]);
        $nbPosts = $req->fetch();

        return $nbPosts;
    }


}