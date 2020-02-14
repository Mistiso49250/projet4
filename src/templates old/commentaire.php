<?php

//connexion à la base de données
    $bdd = new PDO('mysql:host=localhost; dbname=test;charset=utf8', 'root', '');

     while ($donnees = $req->fetch())
    {
    ?>
    <p><strong><?php echo htmlspecialchars($donnees['user']); ?></strong> le
    <?php echo $donnees['date_commentaire']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
    <?php
    } // Fin de la boucle des commentaires
    $req->closeCursor();
    ?>