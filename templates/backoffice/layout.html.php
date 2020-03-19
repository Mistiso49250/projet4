<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<?php

$password = '$2y$12$VZAPxiYA5mhpxXz6tG90iegMorkrSQpvy1KgqCCg7iIYQoC8x.Sfe';
// Le mot de passe n'a pas été envoyé
var_dump($_POST); die();
if (!isset($_POST['mot_de_passe']))
{
    // Afficher le formulaire de saisie du mot de passe
   ?>
    <p>Veuillez saisir le mot de passe pour accéder à la partie administrateur</p>
        <form action="index.php?action=admin" method="post">
            <!-- action chemin redirection et method = methode d'envoie -->
            <p><input type="text" name="utilisateur" placeholder="Utilisateur" /></p>
            <p><input type="password" name="motDePasse" placeholder="Mot de passe"/></p>
            <button class="btn btn-primary">Se connecter</button>
        </form>
   <?php
}// Le mot de passe n'est pas le bon
else if ($_POST['utilisateur'] != 'Forteroche' || password_verify($_POST['motDePase'], $password))
{
    {
        echo '<p>Mot de passe ou utilisateur incorrect</p>';
    }
}// Le mot de passe a été envoyé et il est bon
else
{
    // Afficher la page
    ?>
     <header>
        <nav>
            <ul>
                <li><a href=""></a><i class="fas fa-pen-nib"></i>
                    <h5>Créer un chapitre</h5>
                </li>
                <li><a href=""></a><i class="far fa-edit"></i>
                    <h5>Editer un chapitre</h5>
                </li>
                <li><a href=""></a><i class="fas fa-list-ul"></i>
                    <h5>Commentaires</h5>
                </li>
                <li><a href=""></a><i class="fas fa-sign-out-alt"></i>
                    <h5>Quitter</h5>
                </li>
            </ul>
        </nav>
    </header>
    <?= $content ?>
<?php
}
?>
</body>
</html>