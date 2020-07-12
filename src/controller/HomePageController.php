<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\View\View;
use Oc\Model\AdminManager;
use Oc\Model\ChapitreManager;


class HomePageController
{
    private $view;
    private $adminManager;

    public function __construct()
    {
        $this->view = new View('../templates/frontoffice/');
        $this->adminManager = new AdminManager();
        $this->chapitreManager = new ChapitreManager();
    }

    public function login() 
    {
        $messageError = null;
        if(isset($_SESSION['auth'])){
            header('Location: index.php?action=admin');
            exit();
        }
        elseif(!empty($_POST)) {
            $user = $this->adminManager->auth($_POST['utilisateur']);
            if($user !== null && password_verify($_POST['password'], $user['password'])){
                $_SESSION['auth'] = true;
                header('Location: index.php?action=admin');
                exit();
            }
            $messageError = 'Identifiant ou mot de passe incorrect';
        }

        $this->view->render('login',['messageError'=>$messageError]); 
    }

    public function homePage()
    {
        $this->view->render('homePage', null);
    }
}