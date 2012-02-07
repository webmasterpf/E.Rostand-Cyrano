<?php
/* 
 * Inclus la vue des documents joints (pdf,liens..)
 * dans un bloc pour contenu lycée,archives..
 */

?>
<?php

$viewname_ldj2 = 'Liste_docs_joints';
$view = views_get_view ($viewname_ldj2);
$viewdisplay = $view->set_display('block_2');
$args_ldj2 = $view->set_arguments(array($node->nid));
$emptyText = $view->display_handler->set_option('empty','<div class="bloc_docs_contentVDL"><p>Pas de documents joints.</p></div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if (!empty($view->result)) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_docs_contentVDL"><h3>'.$view->get_title().'</h3>' .$view->preview($viewdisplay, $args_ldj2).'</div>';

//Affiche la vue
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="bloc_docs_contentVDL"><h3 class="#">'.$view->get_title().'</h3>'.$emptyText.'</div>';
    // drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}
?>
