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

    }

    public function auth(string $name, string $password) : ?user
    {
        // Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM user WHERE name = :name');
        $req->execute(['name' => $name]);
        $user = $req->fetch();

       
    }
    
}
