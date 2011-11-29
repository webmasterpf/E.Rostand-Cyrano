<?php
/*
 * contenu du bloc pour les docs utiles sur page lycée
 * listage auto des filefield dans la limite du nombre fixe dans réglage du champ CCK
 */

?>
  <?php if ($node->field_fichier_joint_lycee[0]['view']
          OR
          $node->field_lien_page_lycee[0]['view']
          ): ?>
        <div id="docs-utiles-lycee">
            <h3>Documents utiles</h3>
           <?php
$rows = array();
foreach($node->field_fichier_joint_lycee as $file) {
  if ($file['view']) {
      $rows[] = array($file['view']);
    }
}
$output = theme_table(array(), $rows, array('class' => 'table-docs-utiles-lycee'));
print $output;
?>
            <?php
$rows = array();
foreach($node->field_lien_page_lycee as $file) {
  if ($file['view']) {
      $rows[] = array($file['view']);
    }
}
$output = theme_table(array(), $rows, array('class' => 'table-docs-utiles-lycee'));
print $output;
?>

        </div>
           <?php endif;?>