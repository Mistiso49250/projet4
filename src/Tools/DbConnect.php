<?php

namespace Oc\Tools;

class DbConnect {
    private $db;

    public function connectToDb()
    {
        try
        {
            $this->db = new \PDO('mysql:host=paleron.o2switch.net:2083;dbname=projet4;charset=utf8', 'dami7711_root', 'Forteroche');
            return $this->db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}