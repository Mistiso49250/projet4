<?php

namespace Oc\Tools;

use Oc\Tools\Session;
use Oc\View\View;

class Token{

    private $session;

    public function __construct()
    {
        $this->session = new Session(); 
    }

    //Cette fonction génère, sauvegarde et retourne un token
    //Lui passer en paramètre optionnel un nom pour différencier les formulaires
    function generer_token($nom = 'commentaire')
    {
        //On génére un jeton totalement unique
        $token = uniqid(rand(), true);
        //Et on le stocke
        $this->session[$nom.'_token'] = $token;
        //On enregistre aussi le timestamp correspondant au moment de la création du token
        $this->session[$nom.'_token_time'] = time();

        return $token;
    }

    //Cette fonction vérifie le token
    //On passe en argument le temps de validité (en secondes)
    //Le nom optionnel si on en a défini un lors de la création du token
    function verifier_token($timestamp_ancien, $nom = 'commentaire')
    { //Si le jeton est présent dans la session et dans le formulaire
        if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token'])){
            //Si le jeton de la session correspond à celui du formulaire
            if($_SESSION[$nom.'_token'] == $_POST['token']){
                //On stocke le timestamp qu'il était il y a 15 minutes
                $timestamp_ancien = time() - (15*60);
                //Si le jeton n'est pas expiré
                if($_SESSION[$nom.'_token_time'] >= $timestamp_ancien){
                    return true;
                }
            }
        }
        return false;
    }

}