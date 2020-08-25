<?php

namespace Oc\Tools;

class Session{

    private $instance;

    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $this->session = $_SESSION;
    }

    public function setFlash($key, $message){
        $_SESSION['flash'][$key] = $message;
    }

    public function hasFlashes(){
        return isset($_SESSION['flash']);
    }

    public function getFlashes(){
        $flash = $_SESSION['flash'];
        unset ($_SESSION['flash']);
        return $flash;
    }

}