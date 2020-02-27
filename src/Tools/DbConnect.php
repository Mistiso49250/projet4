<?php

namespace Oc\Projet4\Tools;

class DbConnect {
    private $db;
    
    public function dbConnect()
    {
        try
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
            return $this->db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}