<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\View\View;
use Oc\Model\AdminManager;


class HomePageController
{
    private $view;
    private $adminManager;

    public function __construct()
    {
        $this->view = new View('../templates/frontoffice/');
        $this->adminManager = new AdminManager();
    }

    public function login()
    {
        $messageError = null;
        if(isset($_SESSION['auth'])){
            $user = $req = $this->db->query('SELECT * FROM user')->fetchAll();
                return $user;
            // var_dump('identifié');die();
        }
        elseif(!empty($_POST)) {
            $user = $this->adminManager->auth($_POST['utilisateur']);
            if($user === null){
                $messageError = 'Identifiant ou mot de passe incorrect';
            }elseif($user !== null) {
                password_verify($password, $user->password);
                return $user;
            }
            // var_dump('formulaire validé', $user);die();
        }
        $this->view->render('login',['messageError'=>$messageError]); 
    }

    public function homePage()
    {
        $this->view->render('homePage', null);
    }
}