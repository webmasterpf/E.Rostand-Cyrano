<?php
/* 
 * Inclusion de l'image d'illustration dans le contenu
 */

?>
<?php

$viewname2 = 'Illustration_contenu';
$view = views_get_view ($viewname2);
//$view->dom_id = 'a';
$viewdisplay = $view->set_display('block_1');
$args2 = $view->set_arguments(array($node->nid));
//drupal_set_message('Execution Arguments Vue illustration: NID '.$args2,'status');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="illus-actu">'. $view->preview($viewdisplay, $args2).'</div>';
  //drupal_set_message('Sortie Arguments Vue illustration: NID '.$args2,'status');
}

//Affiche la vue
print $output;
?>
