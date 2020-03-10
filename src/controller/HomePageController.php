<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\View\View;


class homePageController
{
    private $view;

    public function __construct()
    {
        $this->view = new View('../templates/frontoffice/');
    }

    public function homePage()
    {
        $this->view->render('homePage', null);
    }
}
