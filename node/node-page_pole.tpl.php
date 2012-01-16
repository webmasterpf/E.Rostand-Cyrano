<?php
/* Ce template permet la création d'un layout multicolonne pour les pages de base, en permettant la disposition facile
 * des champs CCK custom, si nécessaires pour une page de base.
*/?>
<!--______________NODE TPL POUR PAGE.TPL CUSTOM________________ -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
    <div class="node-inner">

         <?php if ($title): /*copier le titre dans la colonne desirée*/?>
            <h1 class="titre_page-pole clearBoth"><?php print $title; ?></h1>
            <?php endif; ?>
            
        <!--______________COLONNE 1________________ -->
<?php /* choix du layout selon nombre de colonne
* .col1_layout_200_590_200{} .col1_layout_330_all{} .col1_layout_18_56_25{} .col1_layout_370_250_370{} .col1_layout_230_380_380{} .col1_layout_730_250{}
* .col2_layout_200_590_200{} .col2_layout_330_all{} .col2_layout_18_56_25{} .col2_layout_370_250_370{} .col2_layout_230_380_380{} .col2_layout_730_250{}
* .col3_layout_200_590_200{} .col3_layout_330_all{} .col3_layout_18_56_25{} .col3_layout_370_250_370{} .col3_layout_230_380_380{}
* Possible 2 colonnes avec derniere option;alors supprimer colonne-3
         */?>
        
        <div class="content">
        <?php   print $node->content['body']['#value'];/*déplacer le contenu dans la colonne désirée*/ ?>
        </div>


        <div id="colonne-1" class="col1_layout_330_all">
         
   <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_pole_formation_1.php');
              ?>


   <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_region_col_G1.php');
              ?>
        </div>
        <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_330_all">

            <?php print $picture; ?>

            <?php if ($submitted): ?>
            <span class="submitted"><?php print $submitted; ?></span>
            <?php endif; ?>

              
            
            <div class="content">
                

            <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_pole_formation_3.php');
              ?>
<?php
              global $theme_path;
              include ($theme_path.'/includes/inc_region_col_G2.php');
              ?>

            </div>

        </div>

        <!--______________COLONNE 3________________ -->
        <div id="colonne-3" class="col3_layout_330_all">
        <?php
              global $theme_path;
              include ($theme_path.'/includes/inc_pole_formation_2.php');
              ?>          
<?php
              global $theme_path;
              include ($theme_path.'/includes/inc_region_col_G3.php');
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