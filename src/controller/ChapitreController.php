<?php

require_once('src/Model/ChapitreManager.php');
require_once('src/View/View.php');

class FrontController{
    function listChapitre() {
        $chapitreManager = new ChapitreManager();
        $chapitres = $chapitreManager->findChapitres();
        // var_dump($chapitres);die();
        render('listechapitres', $chapitres);
    }
    
    function chapitre($id){
        $post = findChapitre($id);
        var_dump($post); die;
        $commentaires = findCommentaires($_GET['id_commentaire']);
    }
}
