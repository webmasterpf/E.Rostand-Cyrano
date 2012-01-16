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
$emptyText = $view->display_handler->set_option('empty','<div class=""><p>Pas de contenu à afficher en ce moment.</p></div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_docs_ficheform"><h3>'.$view->get_title().'</h3>' .$view->preview($viewdisplay, $args_ldj1).'</div>';
//Affiche la vue
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="bloc_docs_ficheform"><h3>'.$view->get_title().'</h3>'.$emptyText.'</div>';
     //drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}

?>
