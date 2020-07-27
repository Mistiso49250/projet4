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
    
    public function addComment(int $idChapitre, $pseudo, $contenu)
    {
        $affectedLines = $this->commentaireManager->articleComment($idChapitre, $pseudo, $contenu);
        if ($affectedLines === false){
            $this->session->setFlash('danger', 'Impossible d\'ajouter le commentaire !');
            
        }
        else if(!empty('pseudo') || !empty('contenu')){
            $this->session->setFlash('danger','Tout les champs ne sont pas remplis');
        }
        else{
            $this->session->setFlash('success', "Votre message à bien été ajouté");
            header('Location: index.php?action=chapitre&id' . ['chapitre'=>$idChapitre]);
        }
    }

    
}