<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\View\View;
use Oc\Manager\AdminManager;


class homePageController
{
    private $view;
    private $adminManager;
    private $error;
    private $user;

    public function __construct()
    {
        $this->view = new View('../templates/frontoffice/');
        $this->adminManager = new AdminManager();
        $this->error = false;
    }

    public function login()
    {
        if(empty($_POST)){
            header('Location: login.html.php');
        }elseif(!empty($_POST)) {
            $user = $this->adminManager->auth($_POST['name'], $_POST['password']);
            if ($user) {
                header('Location: admin.html.php?login=1');
                exit();
            }$this->error = true;
        }else if($this->error) {
        ?>
        <div class="alert alert-danger">
            Identifiant ou mot de passe incorrect
        </div> 
        <?php
        }

        $this->view->render('homePage', null);
        // methode login affiche formulaire .si  $_POST = null (vide)affiche formulaire
        // else if $_POST != null => adminManager = verif utilisateur = password
        // if mp ok => connect else affiche forumalire avec msg error
        // enregister dans _session =>redirection aminController
    }

    public function homePage()
    {
        $this->view->render('homePage', null);
    }
}