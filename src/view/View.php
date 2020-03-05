<?php
declare(strict_types=1);

namespace Oc\View;

class View
{
    private $frontoffice = '../templates/frontoffice/';
//  private $backoffice = '../templates/backoffice';

    public function render($templates, $data) {
        ob_start();
        require_once($this->frontoffice.$templates.'.html.php');
        $content=ob_get_clean();
        require_once($this->frontoffice.'layout.html.php');
    
    }
}


