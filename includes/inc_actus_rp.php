<?php
/* 
 * Inclus la vue des actualités globales
 * dans un bloc pour contenu lycée,archives..
 */

?>

      
    <?php

$viewname_ag5 = 'Actualites_liste_globale';
$view = views_get_view ($viewname_ag5);
$view->set_display('block_5');
$emptyText = $view->display_handler->set_option('empty','<div class="actu-txt-vide"><p>Pas de contenu à afficher en ce moment.</p></div>');

//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // S'il y a un resultat on récupère le titre (ajoute tag h3, et le contenu)
  $output = '<div id="bloc_actus_rp"><h3>'.$view->get_title().'</h3>' . $view->preview().'</div>';
//Affiche la vue
print $output;
}
//sinon affiche texte vide
elseif (empty($view->result)) {
    //Formatage du texte vide,ajout du titre de la vue
     $outputEmpty = '<div id="bloc_actus_rp"><h3 class="titre-h3">'.$view->get_title().'</h3>'.$emptyText.'</div>';
     //drupal_set_message('$EmptyTextVue : '.$emptyTextVue,'status');
     //Affichage du texte vide
  print $outputEmpty;
}

?>
