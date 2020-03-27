<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\View\View;

class AdminController
{
    private $view;
    private $adminManager;
    

    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');
        $this->adminManager = new AdminManager();         
    }

    public function logAdmin(string $name, string $password) : ?user
    {
       
        
        // $login = $this->adminManager->auth();
        $this->view->render('admin', null);
    }
}
