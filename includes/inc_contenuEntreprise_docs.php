<?php
/* 
 * Inclus la vue des documents joints (pdf,liens..)
 * dans un bloc pour contenu lycée,archives..
 */

?>
<?php

$viewname_ldj4 = 'Liste_docs_joints';
$view = views_get_view ($viewname_ldj4);
$viewdisplay = $view->set_display('block_4');
$args_ldj4 = $view->set_arguments(array($node->nid));
$emptyText = $view->display_handler->set_option('empty','<div class="ma-classe"><p>Pas de documents joints.</p></div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if (!empty($view->result)) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_docs_contentActu"><h3>'.$view->get_title().'</h3>' .$view->preview($viewdisplay, $args_ldj4).'</div>';

//Affiche la vue
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="bloc_docs_contentActu"><h3 class="titre-h3">'.$view->get_title().'</h3>'.$emptyText.'</div>';
    // drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}
?>
