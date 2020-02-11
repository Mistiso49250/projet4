<?php
$frontoffice = 'templates/frontoffice';
$backoffice = 'templates/backoffice';

function render($templates, $data) {
    // // var_dump(__DIR__);die();string(26) "C:\laragon\www\p4\src\View"
    ob_start();
    require_once($frontoffice.$templates.'.html.php');
    $content=ob_get_clean();
    require_once($frontoffice/'layout.html.php');

    // require_once('templates/frontoffice/listechapitres.html.php');die();
}

