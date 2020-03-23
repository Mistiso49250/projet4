<?php session_start(); ?>

<body>
<?php
// le mp et l'identifiant n'a pas était envoyé
if (!isset($_POST['mot_de_passe']))
?>
{
    <!-- Afficher le formulaire de saisie du mot de passe -->
    <h1>Veuillez saisir votre identifiant et le mot de passe pour accéder à la partie administrateur</h1>
        <form action="index.php?action=admin" method="post">
            <!-- action chemin redirection et method = methode d'envoie -->
            <p><input type="text" name="utilisateur" placeholder="Utilisateur" /></p>
            <p><input type="password" name="motDePasse" placeholder="Mot de passe"/></p>
            <button class="btn btn-primary">Se connecter</button>
        </form>
     <?php var_dump($_SESSION)  ?>
}
  
</body>
