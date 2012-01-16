<?php
/* 
 * Inclus la vue pole formation
 * dans un bloc
 * 1  Formations annexes
 * 2 Métiers Admin
 * 3 Métiers Serv. Personne
 */

?>

      
    <?php

$viewname_fl2 = 'Formations_lycee';
$view = views_get_view ($viewname_fl2);
$viewdisplay_fl2 = $view->set_display('block_2');
//$args_ldj1 = $view->set_arguments(array($node->nid));

$emptyText = $view->display_handler->set_option('empty','<div class="table-pole-formations"><p>Nous ne proposons pas de formation de ce type pour le moment.</p></div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="pole_2"><h3 class="titre-pole-formation">'.$view->get_title().'</h3>' .$view->preview($viewdisplay_fl2).'</div>';
   //Affiche la vue si contenu
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="pole_2"><h3 class="titre-pole-formation">'.$view->get_title().'</h3>' .$emptyText.'<br>'.$emptyTextVue.'</div>';
     //drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}

?>
