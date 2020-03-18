<<?php ?>

<!--Editeur de texte -->
     <article id="create">
         <form>
             <div >
                 <h2> Créer un nouveau chapitre : </h2>
             </div>
             <div >
                 <button type="submit">
                     <h5> Enregistrer<br></h5>
                     <i class="far fa-save"></i>
                 </button>
             </div>
             <div class="row">
                 <div >
                     <label for="title">
                         <h3> Titre : </h3>
                     </label>
                     <input type="text" id="title" name="title" value="title">
                 </div>
                 <div >
                     <label for="id_chapter">
                         <h3> Numéro : </h3>
                     </label>
                     <input type="text" id="number_chapter" name="number_chapter" value="number_chapter">
                 </div>
             </div>
             
             <div>
                 <button type="submit" role="submit" class="btn primary">
                     <h5> Enregistrer<br></h5>
                     <i class="far fa-save"></i>
                 </button>
             </div>
         </form>
     </article>