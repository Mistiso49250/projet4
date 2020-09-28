<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\AdminManager;
use Oc\Model\ChapitreManager;
use Oc\Model\CommentaireManager;
use Oc\Model\ReportManager;
use Oc\Tools\Session;
use Oc\View\View;

class AdminController
{
    private $view;
    private $adminManager;
    private $chapitreManager;
    private $commentaireManager;
    private $reportManager;
    private $session;



    public function __construct()
    {
        $this->view = new View('../templates/backoffice/');        
        $this->adminManager = new AdminManager(); 
        $this->chapitreManager = new ChapitreManager();   
        $this->commentaireManager = new CommentaireManager();
        $this->reportManager = new ReportManager();  
        $this->session = new Session();   
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function login()
    {
        if(!isset($_SESSION['auth'])){
            header('Location: index.php?action=login');

            exit();
        }
        $this->view->render('login', null);
    }
    
    public function Admin(int $currentPage = 1)
    {
        $pagePrecedente = 0;
        $pageSuivante = 0;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 5;
        $offset = $postsPerPage * ($currentPage - 1);

        $countChapitre = $this->chapitreManager->countChapitre();

        $nbTotalPages = (int)ceil($countChapitre / $postsPerPage);

       
        if ($currentPage < 1){
            $currentPage = 1;
        }elseif ($currentPage > $nbTotalPages){
            $currentPage = $nbTotalPages;
        }

        //calculer la page précédente, si current page = 1 pas de page prec : =0
        if($currentPage === 1){ 
            $pagePrecedente = 0;
        }else {
            $pagePrecedente = $currentPage - 1;
        }

        //calculer la page suivante
        if($currentPage === $nbTotalPages){
            $pageSuivante = 0;
        }else {
            $pageSuivante = $currentPage + 1;
        }

        $list = $this->chapitreManager->findChapitres($offset, $postsPerPage);

        $countReportedComments = $this->reportManager->getReportedComments();
       
        $this->view->render('admin', [
            'list'=>$list, 
            'session'=> $this->session,
            'pageSuivante'=>$pageSuivante, 
            'pagePrecedente'=>$pagePrecedente, 
            'currentPage'=>$currentPage, 
            'countReportedComments'=>$countReportedComments],
              null);
    }

    //créer un chapitre
    public function newChapitre($post)
    {
        $countReportedComments = $this->reportManager->getReportedComments();
        $newPost = $this->adminManager->testChapitre($post);

        $upload = $this->adminManager->addImage($post[$_FILES]);

        // type de fichier et taille autorisée
        $sortie=false;
        $extensions_ok = array('jpg','jpeg','png');
        $typeimages_ok = array(2,3);
        $taille_ko = 3072;
        $taille_max = $taille_ko*3072;
        $dest_dossier = 'images/'; //nom du dossier ou les images sont stockées
        $dest_fichier="";
        
        // Si le fichier n'est pas un fichier image
        if(!$getimagesize = getimagesize($_FILES['img']['tmp_name'])) 
        {
            $erreurs[] = "Le fichier n'est pas une image valide.";
        }
        // Le fichier n'a pas l'extension autorisée
        else {
            if( (!in_array( get_extension($_FILES['img']['name']), $extensions_ok ))or (!in_array($getimagesize[2], $typeimages_ok )))
            // [2]nombre de caractères qui peuvent être présent dans l'extension du format de l'image
            {
                $erreurs[] = 'Veuillez sélectionner un fichier de type Jpeg ou Png !';
            }

        else {
    
        // vérification poids de l'image
        if( file_exists($_FILES['img']['tmp_name']) and filesize($_FILES['img']['tmp_name']) > $taille_max)
        {
            $erreurs[] = "Votre fichier doit faire moins de $taille_ko Ko !";
        }
        // Si le fichier à la bonne extention et le bon poids
        else {
        
            $dest_fichier = basename($_FILES['img']['name']);
            // caractères autorisée dans le nom
            $dest_fichier = strtr($dest_fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            //remplacement de tou ce qui n'est ni chiffre ni lettre par "_"
            $dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);
            //pour ne pas écraser un fichier existant
            $dossier=$dest_dossier;
            while(file_exists($dossier . $dest_fichier)) {
            $dest_fichier = rand().$dest_fichier;
        }
        // upload de l'image dans le fichier de destination
        if(move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $dest_fichier))
        {
            $valid[] = "Image uploadé avec succés (<a href='".$dossier . $dest_fichier."'>Voir</a>)";
        }
        // erreur d'upload
        else {
            $erreurs[] = "Impossible d'uploader le fichier.<br />Veuillez vérifier que le dossier ".$dossier ;
        }
        }
        }
        }
        
        if(@$erreurs[0]!="")
        {
        // print("<div class="erreurFormulaire">
        // <div class="erreurEntete"> un probleme est survenu lors de l'upload de l'image</div><div class="erreurMessage"> ");
        
        for($i=0;$i<5;$i++){
        if($erreurs[$i]=="")
        break;
        else echo "<li>".$erreurs[$i]."</li>"; $sortie=true;}
        print(" </div></div>");
        }
            
        $this->view->render('newChapitre',[
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments,
        ], null);
        
    }

   
    

    // sauvegarder un chapitre dans la bdd
    public function save($post)
    {
        $countReportedComments = $this->reportManager->getReportedComments();

        $save = $this->adminManager->save($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['numchapitre']);
        if($save === false){
            $this->session->setFlash('danger', 'Impossible de sauvegarder le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été sauvegarder.');
            header('Location: index.php?action=admin');
            exit();
        }
        $this->view->render('save',[
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments,
            
        ]);
    }


    //modifier un chapitre
    public function getChapitre($idChapitre)
    {
        $post = $this->adminManager->getPostUpdate($idChapitre);
        $countReportedComments = $this->reportManager->getReportedComments();

        $this->view->render('updateChapitre',[
            'post'=>$post,
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments
        ], null);
    }

    public function updateChapitre($post, $idChapitre)
    {
        $update = $this->adminManager->updateChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $idChapitre);
        $countReportedComments = $this->reportManager->getReportedComments();

        if($update === false){
            $this->session->setFlash('danger', 'Impossible de modifié le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été modifié.');
            header('Location: index.php?action=admin');
            exit();
        }
        
        $this->view->render('updateChapitre',[
            'post'=>$post,
            'update'=>$update,
            'session'=> $this->session,
            'countReportedComments'=>$countReportedComments
        ]);

    }

    //supprimer un chapitre et ses commentaires
    public function deleteChapitre(int $idChapitre)
    {
        $delete = $this->adminManager->deleteChapitre($idChapitre);
        $deleteComment = $this->commentaireManager->deleteAllCommentChapter($idChapitre);

        if($delete === false){
            $deleteComment === false;
            $this->session->setFlash('danger', 'Impossible de supprimer le chapitre et ses commentaires !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre et ses commentaires on bien été supprimé.');
            header('Location: index.php?action=admin');
            exit();
        }
        
    }

    //page moderer commentaire
    public function moderateComment(int $currentPage = 1)
    {
        $pagePrecedente = 0;
        $pageSuivante = 0;
        // $pagePrecedente = $pagePrecedente - 1 => $pagePrecedente--;
        // $pageSuivante = $pageSuivante + 1 => $pageSuivante++;

        $currentPage = (int)($_GET['page'] ?? 1);

        //determine le nombre d'items par page
        $postsPerPage = 10;
        $offset = $postsPerPage * ($currentPage - 1);

        $countComment = $this->reportManager->adminCountCommentaire();

        $nbTotalPages = (int)ceil($countComment / $postsPerPage);

        if ($currentPage < 1){
            $currentPage = 1;
        }elseif ($currentPage > $nbTotalPages){
            $currentPage = $nbTotalPages;
        }

        //calculer la page précédente, si current page = 1 pas de page prec : =0
        if($currentPage === 1){ 
            $pagePrecedente = 0;
        }else {
            $pagePrecedente = $currentPage - 1;
        }

        //calculer la page suivante
        if($currentPage === $nbTotalPages){
            $pageSuivante = 0;
        }else {
            $pageSuivante = $currentPage + 1;
        }

        $list = $this->commentaireManager->findCommentPagin($offset, $postsPerPage);

        $commentaires = $this->commentaireManager->adminFindComment();
        $countReportedComments = $this->reportManager->getReportedComments();
        
        $this->view->render('moderateComment',[
            'session'=> $this->session,
            'commentaires'=>$commentaires,
            'countReportedComments'=>$countReportedComments,
            'list'=>$list, 
            'pageSuivante'=>$pageSuivante, 
            'pagePrecedente'=>$pagePrecedente, 
            'currentPage'=>$currentPage
        ], null);
    }


    // supprimer un commentaire
    public function deleteComment(int $id_commentaire)
    {
        $delete = $this->reportManager->deleteCommentReport($id_commentaire);
        if($delete === false){
            $this->session->setFlash('danger', 'Impossible de supprimer le commentaire !');
        }
        else{
            $this->session->setFlash('success', 'Le commentaire a bien été supprimer.');

            header('Location: index.php?action=moderateComment');
            exit();
            
        }
        
    }
    
    
}


