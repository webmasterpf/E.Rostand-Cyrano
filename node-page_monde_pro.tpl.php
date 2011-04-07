<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
<!--____________LAYOUT NODE page_monde_pro____________________________ -->
<?php
//print "<pre>";
//print_r ($node);
//print "</pre>";
?>

    <?php if (!$page): ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>

    <?php print $picture; ?>

    <?php if ($submitted): ?>
      <span class="submitted"><?php print $submitted; ?></span>
    <?php endif; ?>

    <div class="content">
     <?php print $node->content['body']['#value'] ?>
    <!-- <table>documents filefield -->
 <?php if ( $node->field_fiches_info_stage_pfe[0] ): ?>
<table id="table-fichiers">
<tr>
<?php $iteration = 0; ?>

<?php foreach($node->field_fiches_info_stage_pfe as $item): ?>
<?php if ($iteration % 2 == 0 && $iteration > 0): ?>
   </tr>
   <tr>
<?php endif; ?>

<td><?php  print $item['view'] ?></td>

<?php $iteration++ ; ?>
<?php endforeach; ?>

  </tr>
</table>

<?php endif; ?>


    <!--fin de la <table>fichiers  -->
    </div>

    <?php if ($terms): ?>
      <div class="taxonomy"><?php print $terms; ?></div>
    <?php endif;?>

    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>

  </div> <!-- /node-inner -->
</div> <!-- /node-->