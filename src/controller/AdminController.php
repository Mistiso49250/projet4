<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\View\View;

class AdminController
{
    private $view;
    private $adminManager;
    private $password;
    

    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');
        $this->adminManager = new AdminManager();
        // $this->password = '$2y$12$VZAPxiYA5mhpxXz6tG90iegMorkrSQpvy1KgqCCg7iIYQoC8x.Sfe'; //Alaska
        
    }

    public function logAdmin(string $name, string $password) : ?user
    {
        $user = $req = $bdd->query('SELECT * FROM user')->fetchAll();
        if (password_verify($password, $this->user->password)){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
        // $login = $this->adminManager->auth();
        $this->view->render('admin', null);
    }
}
