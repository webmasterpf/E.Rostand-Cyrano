<?php
/* 
 * Inclus la vue avec filtre exposé
 * dans un bloc pour liste des archives
 * IMPORTANT Style affichage  : grille !!
 */

?>

      
    <?php

$viewname_vdl2 = 'Liste_vdl';
$view = views_get_view ($viewname_vdl2);
$view->set_display('block_2');

$emptyText = $view->display_handler->set_option('empty','<div class="ma-classe"><p>Pas de contenu à afficher en ce moment.</p></div>');
//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
 $output = '<div id="bloc_liste_vdl"><h3>'.$view->get_title().'</h3>' . $view->preview().'</div>';
 
//Affiche la vue
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="bloc_liste_vdl"><h3 class="titre-h3">'.$view->get_title().'</h3>' .$emptyText.'</div>';
     //drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}
?>
