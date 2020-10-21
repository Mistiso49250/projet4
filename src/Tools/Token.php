<?php

namespace Oc\Tools;

use Oc\Tools\Session;
use SNMP;

class Token{

    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session; 
    }

    //Cette fonction génère, sauvegarde et retourne un token
    //Lui passer en paramètre optionnel un nom pour différencier les formulaires
    function genererToken()
    {
        //On génére un jeton totalement unique
        $token = uniqid(rand(), true);
        //Et on le stocke
        $this->session->setToken($token);

        return $token;

    }

    //Cette fonction vérifie le token
    //On passe en argument le temps de validité (en secondes)
    //Le nom optionnel si on en a défini un lors de la création du token
    function verifierToken()
    { //Si le jeton est présent dans la session et dans le formulaire
        if(isset($_POST['token'])){
            //Si le jeton de la session correspond à celui du formulaire
            if($_SESSION['token'] == $_POST['token']){
                return true;
            }
            return false;
        }
    }
    

}