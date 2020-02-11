<?php

class ChapitreManager
{
    function findChapitres()
    {
        $db = dbConnect();

        $req = $db->query('SELECT * FROM chapitre ORDER BY date_publication DESC ');


        return $req->fetchAll();
    }

    function findChapitre($postId)
    {
        $db = dbConnect();
        $req = $db->prepare('SELECT id_chapitre, titre, contenu_chapitre, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr, images FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    function findComments($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT id_commentaire, id_chapitre, pseudo, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE post_id = ? ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}