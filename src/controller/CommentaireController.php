<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\CommentaireManager;
use Oc\Tools\Session;

class CommentaireController
{
    private $commentaireManager;
    private $session;
    
    public function __construct()
    {
        $this->commentaireManager = new CommentaireManager();
        $this->session = new Session();
    }
    
    // pour ajouter un commentaire
    public function addComment(int $idChapitre, $pseudo, $contenu, $token)
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

    
}