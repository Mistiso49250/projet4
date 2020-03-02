<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\homePageManager;
use Oc\View\View;


class homePageController
{
    private $homePageManager;

    public function __construct()
    {
        $this->$homePageManager = new HomePageManager();
    }

    public function homePage()
    {
         
    }
}
