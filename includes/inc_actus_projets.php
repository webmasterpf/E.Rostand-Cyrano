<?php
/* 
 * Inclus la vue des actualités globales
 * dans un bloc pour contenu lycée,archives..
 */

?>

      
    <?php

$viewname_ag3 = 'Actualites_liste_globale';
$view = views_get_view ($viewname_ag3);
$view->set_display('block_3');


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_actus_projet"><h3>'.$view->get_title().'</h3>' . $view->preview().'</div>';
}

//Affiche la vue
print $output;

?>
