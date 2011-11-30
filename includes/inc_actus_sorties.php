<?php
/* 
 * Inclus la vue des actualités globales
 * dans un bloc pour contenu lycée,archives..
 */

?>

      
    <?php

$viewname = 'Actualites_liste_globale';
$view = views_get_view ($viewname);
$view->set_display('block_4');


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_actus_sortie"><h3>'.$view->get_title().'</h3>' . $view->render().'</div>';
}

//Affiche la vue
print $output;

?>
