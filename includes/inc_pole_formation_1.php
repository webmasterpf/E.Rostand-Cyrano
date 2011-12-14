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

$viewname_fl1 = 'Formations_lycee';
$view = views_get_view ($viewname_fl1);
$viewdisplay_fl1 = $view->set_display('block_1');
//$args_ldj1 = $view->set_arguments(array($node->nid));


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="pole_1"><h3 class="titre-pole-formation">'.$view->get_title().'</h3>' .$view->preview($viewdisplay_fl1).'</div>';
}

//Affiche la vue
print $output;

?>
