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

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function Admin()
    {
        if(!isset($_SESSION['auth'])){
            header('Location: index.php?action=login');
            exit();
        }
        $this->view->render('admin', null);
    }

    
}
