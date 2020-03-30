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
        // if (session_status() === PHP_SESSION_NONE){
        //     session_start();
        // }
        // $id = $_SESSION['auth'] ?? null; 
        // // ?? = pas defini
        // if ($id === null) {
        //     return null;
        // }
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
        // var_dump($user, null);die();

        if ($user === false) {

            return null;
        }
        // elseif ($user === true) {
        //     return $user;
        // }
        return $user;
        
    }
}
