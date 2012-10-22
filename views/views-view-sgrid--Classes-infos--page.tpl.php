<?php
/**
 * @file views-view-grid.tpl.php
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 * - $class contains the class of the table.
 * - $attributes contains other attributes for the table.
 * @ingroup views_templates
 *
 * MISE EN FORME DE LA GRILLE
 */
?>
<?php
/* Ce template permet la création d'un layout multicolonne pour les pages de base, en permettant la disposition facile
 * des champs CCK custom, si nécessaires pour une page de base.
*/?>
<!--______________NODE TPL POUR PAGE.TPL CUSTOM________________ -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
    <div class="node-inner">
        <!--______________COLONNE 1________________ -->
        <?php /* choix du layout selon nombre de colonne
         * .col1_layout_200_590_200{} .col1_layout_330_all{} .col1_layout_18_56_25{} .col1_layout_730_250{}
         * .col2_layout_200_590_200{} .col2_layout_330_all{} .col2_layout_18_56_25{} .col2_layout_730_250{}
         * .col3_layout_200_590_200{} .col3_layout_330_all{} .col3_layout_18_56_25{}
         * Possible 2 colonnes avec derniere option;alors supprimer colonne-3
         */?>
        <div id="colonne-1" class="col1_layout_730_250 plycee">


               <?php print $picture; ?>

            <?php if ($submitted): ?>
            <span class="submitted"><?php print $submitted; ?></span>
            <?php endif; ?>

 <?php

$viewname_ci1 = 'Classes_infos';
$view = views_get_view ($viewname_ci1);
$view->set_display('page_2');


//Exécution de le vue
$view->pre_execute();
$view->execute();

if ($view->result) {
  // Récupération du titre du display
  $output = '<h1 class="titre_rouge">'.$view->get_title().'</h1>';
}

//Affiche la vue
print $output;

?>
          

            <div class="content">
<?php
// Is the user allowed to sort Sortable Grids ?
    drupal_add_js(array('sgrid' => array(
                                        'sort_order' => array(),
                                        'row_length' => $row_length,
                                        'sort_allowed' =>  user_access('sort Sortable Grid Views'),
                                        )
                            ), 
    'setting'); 
     $jq_path = drupal_get_path('module', 'jquery_ui') . '/jquery.ui/ui/';
    drupal_add_js( $jq_path . 'ui.core.js');    
    drupal_add_js($jq_path . 'ui.draggable.js');    
    drupal_add_js($jq_path . 'ui.sortable.js');      
    drupal_add_js(drupal_get_path('module', 'sgrid') . '/sgrid.js');   
    drupal_add_css(drupal_get_path('module', 'sgrid') . '/sgrid.css');   
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
<!-- Add the end of line class when necessary -->
    <?php  if (isset($sgrid_end_of_line[$id])) : $classes[$id] .= $sgrid_end_of_line[$id]; endif; ?>
       <li class="<?php print $classes[$id]; ?>"><?php print $row; ?></li>
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>

            </div>


             <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_region_col_G1.php');
              ?>
        </div>
        <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_730_250 plycee">


 <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_rostand_actus.php');
              ?>

        </div>


            <!--______________LIENS MENU et TAXO________________ -->
        <?php if ($terms): ?>
        <div class="taxonomy"><?php //print $terms; ?></div>
        <?php endif;?>

        <?php if ($links): ?>
        <div class="links"> <?php //print $links; ?></div>
        <?php endif; ?>

    </div> <!-- /node-inner -->
</div> <!-- /node-->
