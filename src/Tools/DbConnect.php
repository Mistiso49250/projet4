<?php

namespace Oc\Tools;
use Exception;

class DbConnect {
    private $db;

    public function connectToDb()
    {
        try
        {
  $this->db = new \PDO('mysql:host=localhost;dbname=vnth3444_projet4;charset=utf8', 'vnth3444', 'E?@Zqrssn6kT');
   return $this->db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}