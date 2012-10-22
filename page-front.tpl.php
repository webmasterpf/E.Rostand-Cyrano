<?php
global $theme_path;
include ($theme_path.'/includes/inc_header.php');
?>
<!-- ______________________ LAYOUT HOMEPAGE _______________________ -->
 <!-- ______________________ CONTENU _______________________ -->
    
	<div id="mainPage">
	
     
   

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>
<br class="clearBoth"/>
   <!-- ______________________ ZONE DIAPO _______________________ -->
			
              <?php if ($DiapoHP): ?>
                 <div id="HPDiapo"><?php print $DiapoHP; ?></div>
              <?php endif; ?>
              
            
         
<br clear="all"/>


<!-- ______________________ PARTIE BAS GAUCHE _______________________ -->
                 <?php if ($HPBasGauche): ?>
                 <div id="BasGaucheHP"><?php print $HPBasGauche; ?></div>
              <?php endif; ?>  
		 
<!-- ______________________ PARTIE BAS DROITE _______________________ -->
      
	  
	 
        <?php if ($HPBasDroit): ?>
     <div id="BasDroitHP"><?php print $HPBasDroit; ?></div>
        <?php endif; ?>
		
     
	  
   
	<br clear="all"/>
	<!-- ______________________ CONTENU BAS _______________________ -->
    <?php if ($content_bottom_home): ?>
    <div id="content-bottom-home">
      <?php print $content_bottom_home; ?>
         <?php //print $feed_icons; ?>
    </div><!-- /#content-bottom -->
    <?php endif; ?>
    <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>
	
	
	 
     <?php
global $theme_path;
include ($theme_path.'/includes/inc_footer.php');
?>
</div> <!-- /mainPage -->