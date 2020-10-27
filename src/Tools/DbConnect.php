<?php

namespace Oc\Tools;
use Exception;

class DbConnect {
    private $db;

    public function connectToDb()
    {
        try
        {
  $this->db = new \PDO('mysql:host=localhost;dbname=dami7711_forteroche;charset=utf8', 'dami7711_root', 'O6jJnyQ3hGwL');
   return $this->db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}