<?php
/* 
 * Inclus la vue des actualités globales
 * dans un bloc pour contenu lycée,archives..
 */

?>

      
    <?php

$viewname_ldj1 = 'Liste_docs_joints';
$view = views_get_view ($viewname_ldj1);
$viewdisplay = $view->set_display('block_1');
$args_ldj1 = $view->set_arguments(array($node->nid));


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_docs_ficheform"><h3>'.$view->get_title().'</h3>' .$view->preview($viewdisplay, $args_ldj1).'</div>';
}

//Affiche la vue
print $output;

?>
