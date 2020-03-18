<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\View\View;

class adminCreatController
{
    private $view;

    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');
    }

    public function adminCreat(){

    }
}


