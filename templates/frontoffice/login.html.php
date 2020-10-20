<div id="chapitreBanniere">
    <div class="banniere">
        <h2>Se connecter</h2>
    </div>
</div> 

<?php
if($data['messageError'] !== null){
    ?><div class="alert alert-danger"><?=$data['messageError']?></div><?php
}
?>
    <!-- Afficher le formulaire de saisie du mot de passe -->
    <h1 class="titleConnection">Veuillez saisir votre identifiant et mot de passe pour accéder à la partie administrateur</h1>
        <form class="formConnection" action="index.php?action=login" method="post">
            <label for="identifiant">Identifiant :</label>
            <input type="text" name="utilisateur" required pattern="^[A-Za-z '-]+$"/>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="password" />
            <button class="btn btn-primary">Se connecter</button>
        </form>
