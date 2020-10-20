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
    function verifierToken($timestamp_ancien, $nom = 'forteroche')
    { //Si le jeton est présent dans la session et dans le formulaire
        if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token'])){
            //Si le jeton de la session correspond à celui du formulaire
            if($_SESSION[$nom.'_token'] == $_POST['token']){
                //On stocke le timestamp qu'il était il y a 3 minutes
                $timestamp_ancien = time() - (3*60);
                //Si le jeton n'est pas expiré
                if($_SESSION[$nom.'_token_time'] >= $timestamp_ancien){
                    return true;
                }
            }
            return false;
        }
    }
    

}