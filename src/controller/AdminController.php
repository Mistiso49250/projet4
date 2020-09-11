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
    
    public function Admin()
    {
        $currentPage = (int)($_GET['page'] ?? 1);
        $postsPerPage = 7;
        $offset = $postsPerPage * ($currentPage - 1);

        $list = $this->chapitreManager->adminListChapitres();
        $countReportedComments = $this->reportManager->getReportedComments();
       
        $this->view->render('admin', [
            'list'=>$list, 
            'countReportedComments'=>$countReportedComments],
              null);
    }

    //créer un chapitre
    public function newChapitre($post)
    {
        if(isset($post['titre']) ){
            $newPost = $this->adminManager->creatChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $post['image']);
            // $newImage = $this->adminManager->addImage();
                // Vérifier si le formulaire a été soumis
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Vérifie si le fichier a été uploadé sans erreur.
                if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];
                    // $_FILES["photo"]["name"] — Cette valeur du tableau spécifie le nom original du fichier, y compris l'extension du fichier.
                    //                            Il n'inclut pas le chemin d'accès au
                    // $_FILES["photo"]["type"] — Cette valeur du tableau spécifie le type MIME du fichier.
                    // $_FILES["photo"]["size"] — Cette valeur du tableau spécifie la taille du fichier, en octets.
                    // $_FILES["photo"]["tmp_name"] — Cette valeur du tableau spécifie le nom temporaire, y compris le chemin complet qui est
                    //                              assigné au fichier une fois qu'il a été uploadé sur le serveur.
                    // $_FILES["photo"]["error"] — Cette valeur du tableau spécifie le code d'erreur ou d'état associé à l'upload du fichier, 
                    //                              par exemple 0, s'il n'y a pas d'erreur.

                    // Vérifie l'extension du fichier
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                    // Vérifie la taille du fichier - 5Mo maximum
                    $maxsize = 5 * 1024 * 1024;
                    if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                    // Vérifie le type MIME du fichier
                    if(in_array($filetype, $allowed)){
                        // Vérifie si le fichier existe avant de le télécharger.
                        if(file_exists("images/" . $_FILES["photo"]["name"])){
                            echo $_FILES["photo"]["name"] . " existe déjà.";
                        } else{
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . $_FILES["photo"]["name"]);
                            echo "Votre fichier a été téléchargé avec succès.";
                        } 
                    }else{
                        echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                    }
                }else{
                    echo "Error: " . $_FILES["photo"]["error"];
                }
            }

            header('Location: index.php?action=admin');
            exit;
        }
        
        $this->view->render('newChapitre', null);
        
    }


    //modifier un chapitre
    public function getChapitre($idChapitre)
    {
        $post = $this->adminManager->getPostUpdate($idChapitre);
        // var_dump($post); 
        // echo '<pre>';
        // print_r($post);
        // echo '</pre>';
        // die();

        $this->view->render('updateChapitre',['post'=>$post], null);
    }

    public function updateChapitre($post, $idChapitre)
    {
        $update = $this->adminManager->updateChapitre($post['titre'], $post['contenu_chapitre'], $post['extrait'], $idChapitre);
        
        if($update === false){
            $this->session->setFlash('danger', 'Impossible de modifié le chapitre !');
        }
        else{
            $this->session->setFlash('success', 'Le chapitre à bien été modifié.');
        }
        
        header('Location: index.php?action=admin');
        exit();

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
        }

        header('Location: index.php?action=admin');
        exit();
    }

    //page moderer commentaire
    public function moderateComment(int $idChapitre)
    {
        $commentaires = $this->commentaireManager->findComments($idChapitre);

        $this->view->render('moderateComment',['commentaires'=>$commentaires], null);
    }

    // supprimer un commentaire signalé
    public function deleteComment(int $id_commentaire)
    {
        $delete = $this->reportManager->deleteCommentReport($id_commentaire);
        if($delete === false){
            $this->session->setFlash('danger', 'Impossible de supprimer le commentaire !');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
        }
        header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        exit();
    }

    public function editComment($id_commentaire, $commentaireManager)
    {
        $edit = $this->commentaireManager->updateComment($id_commentaire, $commentaireManager);
        if($edit === false){
            $this->session->setFlash('danger', 'Impossible de modifier le commentaire !');
        }
        else{
            echo 'commentaire: ' . $_POST['comment'];
        }
        header('Location: index.php?action=commentaire&id=' . $id_commentaire);
        exit();
    }

}