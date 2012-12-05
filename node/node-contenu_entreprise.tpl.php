<?php
/* Ce template permet la création d'un layout multicolonne pour les pages de base, en permettant la disposition facile
 * des champs CCK custom, si nécessaires pour une page de base.
*/?>
<!--______________NODE TPL POUR PAGE.TPL ENTREPRISE CUSTOM________________ -->
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
    <div class="node-inner">
        <!--______________COLONNE 1________________ -->
<?php /* choix du layout selon nombre de colonne
* .col1_layout_200_590_200{} .col1_layout_330_all{} .col1_layout_18_56_25{} .col1_layout_370_250_370{} .col1_layout_230_380_380{} .col1_layout_730_250{}
* .col2_layout_200_590_200{} .col2_layout_330_all{} .col2_layout_18_56_25{} .col2_layout_370_250_370{} .col2_layout_230_380_380{} .col2_layout_730_250{}
* .col3_layout_200_590_200{} .col3_layout_330_all{} .col3_layout_18_56_25{} .col3_layout_370_250_370{} .col3_layout_230_380_380{}
* Possible 2 colonnes avec derniere option;alors supprimer colonne-3
         */?>
        <div id="colonne-1" class="col1_layout_730_250 content_vdl">
            <?php if ($title): /*copier le titre dans la colonne desirée*/?>
            <h1 class="titre_page"><?php print $title; ?></h1>

                  <?php print $picture; ?>

            <?php if ($submitted): ?>
            <span class="submitted"><?php print $submitted; ?></span>
            <?php endif; ?>

            <div class="content">
                <?php   print $node->content['body']['#value'];/*déplacer le contenu dans la colonne désirée*/ ?>

                      <?php if ($node->field_video_entreprise[0]['view']): ?>
            <div id="video-vdl">
                    <?php  print $node->field_video_entreprise[0]['view']  ?>
            </div>
            <?php endif;?>

                   <?php if ($node->field_choix_galerie_vdl[0]['view']): ?>
            <div id="galerie-vdl">
                    <?php  print $node->field_choix_galerie_vdl[0]['view']  ?>
            </div>
            <?php endif;?>




            </div>

            
            <?php endif; ?>
             <?php
              $theme_path = drupal_get_path('theme','cyrano_er');
              include ($theme_path.'/includes/inc_region_col_G1.php');
              ?>
        </div>
        <!--______________COLONNE 2________________ -->
         <!-- <pre> <?php //print_r($node); ?> </pre>-->   <!-- listage des variables du $content -->
        <div id="colonne-2" class="col2_layout_730_250">
<div class="ma-taxo">
<?php print $my_terms; ?>
</div>
             <?php
              $theme_path = drupal_get_path('theme','cyrano_er');
              include ($theme_path.'/includes/inc_contenuEntreprise_docs.php');
              ?>
<br/>
          <?php
              $theme_path = drupal_get_path('theme','cyrano_er');
              include ($theme_path.'/includes/inc_rostand_actus.php');
              ?>
            
            <!--***********!!!!!!  EXEMPLE DE CHAMP CCK INCLUS AVEC CONDITION !!!!!!!!************ -->
            <?php if ($node->nom_du_champ[0]['view']): ?>
  <div id="nom-css">
                    <?php  print $node->nom_du_champ[0]['view']  ?>
            </div>
            <?php endif;?>

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