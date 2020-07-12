<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="burger">
                <a href="#" class="burgerIcon" id="burgerIcon"></a>
                <ul class="menu">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="index.php?action=listchapitre">Un Billet Simple pour l'Alaska</a></li>
                        <ul>
                        <?php while( $data = $episode){ ?>
                            <li><a href="index.php?action=listchapitre">Tous les chapitres</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Prologue</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Chapitre 1</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Chapitre 2</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Chapitre 3</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Chapitre 4</a></li>
                            <li><a href="index.php?action=chapitre&id=<?=htmlspecialchars($data['id_chaptire'])?>">Chapitre 5</a></li>
                        <?php } ?>
                        </ul>
                    <li><a href="index.php?action=admin">Admin</a></li>
                </ul>
            </section>

</body>
</html>