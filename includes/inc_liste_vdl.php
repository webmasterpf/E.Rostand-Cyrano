<?php
/* 
 * Inclus la vue avec filtre exposé
 * dans un bloc pour liste des archives
 * IMPORTANT Style affichage  : grille !!
 */

?>

      
    <?php

$viewname_vdl1 = 'Liste_vdl';
$view = views_get_view ($viewname_vdl1);
$view->set_display('block_1');


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
 $output = '<div id="bloc_liste_vdl"><h3>'.$view->get_title().'</h3>' . $view->preview().'</div>';
 
}

//Affiche la vue
print $output;

?>
