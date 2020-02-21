<?php
declare(strict_types=1);
// $frontoffice = 'templates/frontoffice';
// $backoffice = 'templates/backoffice';
class View
{
    public function render($templates, $data) {
        // // var_dump(__DIR__);die();string(26) "C:\laragon\www\p4\src\View"
        ob_start();
        require_once('templates/frontoffice/'.$templates.'.html.php');
        $content=ob_get_clean();
        require_once('templates/frontoffice/layout.html.php');
    
        // require_once('templates/frontoffice/listechapitres.html.php');die();
    }
}


