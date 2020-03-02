<?php
declare(strict_types=1);

namespace Oc\Model;

class HomePageManager extends Manager
{ 
    private $db;

    public function __construct() {
        $this->db = new DbConnect();
    }
    
    
}


