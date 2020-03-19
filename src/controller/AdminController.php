<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\View\View;

class AdminController
{
    private $view;
    private $log;

    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');
    }

    public function logAdmin() : void
    {
        $login = $this->log->auth();
        $this->view->render('admin', null);
    }

    // if (password_verify($password, $user->password))
    // {
    //     return $user;
    // }
    // return null;
}
