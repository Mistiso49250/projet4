<?php foreach($data as $episodes): ?>
<div class="chapitre">
    <img src="public/images/<?=$episodes['image']?>" alt="route Alaska">
    <h3 class="chapitreTitle"><?=$episodes['titre']?></h3>
    <?= $episodes['extrait_chapitre'] ?>
    <div class="lireChapitre">
        <a href="index.php?action=chapitre&id=<?=$episodes['id_chapitre']?>">Lire le chapitre</a>
    </div>
</div>
<?php endforeach; ?>

<!-- <div class="prologue">
    <img src="public/images/prologue.jpg" alt="train Alaska">
    <h3 class="chapitreTitle">Prologue</h3>
    <p>Wren dépose les deux valises à roulettes près de la poussette et tire une longue
        bouffée de la cigarette négligemment fichée au coin de ses lèvres. </p>
    <p>Il souffle la fumée dans l’air glacé.</p>
    <div class="lireChapitre">
        <a href="prologue.html">Lire le chapitre</a>
    </div>
</div>



<div class="chapitre">
    <img src="public/images/chapitre2.jpg" alt="paysage alaska">
    <h3 class="chapitreTitle">Chapitre 2</h3>
    <p>Le métro de Toronto est tellement calme et désert à cette heure de la journée que
        j’ai pu m’asseoir où je voulais.</p>
    <p>Je peine à me rappeler de la dernière fois que j’ai eu ce luxe.</p>
    <div class="lireChapitre">
        <a href="chapitre2.html">Lire le chapitre</a>
    </div>
</div>

<div class="chapitre">
    <img src="public/images/chapitre3.jpg" alt="paysage avec ours">
    <h3 class="chapitreTitle">Chapitre 3</h3>
    <p>Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte acheté chez Starbucks –
        taille venti – et sauvegardé mes derniers fichiers Excel </p>
    <p>Un message est arrivé sur ma boîte mail, m’informant que le patron voulait que je descende le voir dans la salle
        Algonquin</p>
    <div class="lireChapitre">
        <a href="chapitre3.html">Lire le chapitre</a>
    </div>
</div>

<div class="chapitre">
    <img src="public/images/chapitre4.jpg" alt="montagne alaska">
    <h3 class="chapitreTitle">Chapitre 4</h3>
    <p>J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités professionnelles.</p>
    <p>Evidemment, la société m’assurerait un important soutien financier durant cette période « transitoire ».</p>
    <div class="lireChapitre">
        <a href="chapitre4.html">Lire le chapitre</a>
    </div>
</div>

<div class="chapitre">
    <img src="public/images/chapitre5.jpg" alt="mangrove alaska">
    <h3 class="chapitreTitle">Chapitre 5</h3>
    <p>Je savais que cette machine finirait par être installée, que les postes d’analystes seraient réduits et le
        travail redistribué.</p>
    <p>Mais j’ai été assez stupide pour me croire indispensable et penser que je serais épargnée. </p>
    <div class="lireChapitre">
        <a href="chapitre5.html">Lire le chapitre</a>
    </div>
</div>
 -->
