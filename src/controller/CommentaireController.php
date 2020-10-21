<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\CommentaireManager;
use Oc\Tools\Session;
use Oc\Tools\Token;

class CommentaireController
{
    private $commentaireManager;
    private $session;
    private $verifierToken;
    
    public function __construct()
    {
        $this->commentaireManager = new CommentaireManager();
        $this->session = new Session();
        $this->verifierToken = new Token($this->session);
    }
    
    // pour ajouter un commentaire
    public function addComment(int $idChapitre, $pseudo, $contenu, $token)
    {
        if($this->verifierToken->verifierToken())
        {
            var_dump($token); die();
            if(empty($pseudo) || empty($contenu)){
                $this->session->setFlash('danger','Tout les champs ne sont pas remplis');
            }
            else{
                $affectedLines = $this->commentaireManager->articleComment($idChapitre, $pseudo, $contenu);

                if($affectedLines === false){
                    $this->session->setFlash('danger', 'Impossible d\'ajouter le commentaire !');
                }
                else{
                    $this->session->setFlash('success', "Votre message à bien été ajouté");
                }
            }
                header('Location: index.php?action=chapitre&id=' . $idChapitre);
                exit();
        }
        else
        {
            $this->session->setToken('danger', "Une erreur c'est produite");	
        }
        
    }

    
}