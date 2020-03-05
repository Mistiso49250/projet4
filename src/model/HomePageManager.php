<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class HomePageManager
{ 
    private $db;

    public function __construct() {
        $this->db = (new DbConnect())->connectToDb();
    }
    
    
}


