<?php
declare(strict_types=1);

namespace Oc\Controller;

// use Oc\Model\AdminManager;
use Oc\View\View;

class AdminController
{
    private $view;

    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');
    }

    public function admin()
    {
        $this->view->render('admin', null);
    }
}
