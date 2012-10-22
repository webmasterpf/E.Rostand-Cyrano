<?php
// $Id: draggableviews-view-draggabletable.tpl.php,v 1.6.2.11 2010/08/27 14:08:25 sevi Exp $
/**
 * This file is a modified version of: views-view-table.tpl.php,v 1.8 2009/01/28 00:43:43 merlinofchaos.
 * 
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 *
 * - $tabledrag_tableId: The table id that drupal_add_tabledrag needs
 *
 * Tpl pour vue avec tableau classable.Views 3
 */
?><!--______________NODE TPL POUR PAGE.TPL CUSTOM CLASSES ________________ -->
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
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<table id="table-classes" class="<?php print $class; ?>" id="<?php print $tabledrag_table_id; ?>">
  <thead>
    <tr>
      <?php foreach ($header as $field => $label): ?>
        <th class="views-field views-field-<?php print $fields[$field]; ?>"<?php if (!empty($style[$field])) print ' style="'. $style[$field] .'"'; ?>>
          <?php print $label; ?>
        </th>
      <?php endforeach ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $count => $row): ?>
      <tr class="draggable <?php print implode(' ', $row_classes[$count]); ?><?php if (!empty($draggableviews_extended[$count])) print ' draggableviews-extended'; ?><?php if (!empty($tabledrag_type[$count])) print ' '. $tabledrag_type[$count]; ?>">
        <?php foreach ($row as $field => $content): ?>
          <td class="views-field views-field-<?php print $fields[$field]; ?>"<?php if (!empty($style[$field])) print ' style="'. $style[$field] .'"'; ?>>
            <?php print $content; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </div>
   <!--______________LIENS MENU et TAXO________________ -->
        <?php if ($terms): ?>
        <div class="taxonomy"><?php //print $terms; ?></div>
        <?php endif;?>

        <?php if ($links): ?>
        <div class="links"> <?php //print $links; ?></div>
        <?php endif; ?>

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


         

    </div> <!-- /node-inner -->
</div> <!-- /node-->