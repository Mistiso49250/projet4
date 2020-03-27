<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Connection</h2>
    </div>
</div> 

<?php
if($data['messageError'] !== null){
    ?><div class="alert alert-danger"><?=$data['messageError']?></div><?php
}
?>
    <!-- Afficher le formulaire de saisie du mot de passe -->
    <h1 class="titleConnection">Veuillez saisir votre identifiant et le mot de passe pour accéder à la partie administrateur</h1>
        <form class="formConnection" action="index.php?action=admin" method="post">
            <!-- action chemin redirection et method = methode d'envoie -->
            <p><input type="text" name="utilisateur" placeholder="Utilisateur" /></p>
            <p><input type="password" name="motDePasse" placeholder="Mot de passe"/></p>
            <button class="btn btn-primary">Se connecter</button>
        </form>
