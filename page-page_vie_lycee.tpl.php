<?php include "inc_header.php"; ?>
 <!-- ______________________ LAYOUT PAGE VIE DU LYCEE - LISTE _______________________ -->
  <!-- ______________________ CONTENU _______________________ -->
  
      <div id="contentPage">
      
          <!-- ______________________ CONTENT TOP _______________________ -->
      <?php if ($breadcrumb ||$content_top ): ?>
            <div id="content-top">
	<span id="ariane"> <?php print $breadcrumb; ?></span>

              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
	 <!-- ______________________ COLONNE GAUCHE _______________________ -->

			  <?php if ($left): ?>
         <div id="left-content-vie-lycee">
           
            <?php print $left; ?>
          </div>
             <?php endif; ?> <!-- /sidebar-left -->
      
       <!-- ______________________ CONTENT INNER _______________________ -->
		
        
        <div id="content-inner-vie-lycee" class="inner column center">
		             
		    <?php if ($title): ?>
                <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>
           

          <?php if ($mission || $messages || $help || $tabs): ?>
            <div id="content-header">              

              <?php if ($mission): ?>
                <div id="mission"><?php print $mission; ?></div>
              <?php endif; ?>

              <?php print $messages; ?>

              <?php print $help; ?> 

              <?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>

            </div> <!-- /#content-header -->
          <?php endif; ?>
		  <!-- ______________________ CONTENU CENTRAL _______________________ -->
          <div id="middle-content-vie-lycee">
            <?php print $content; ?>
              <?php print $feed_icons; ?>
          </div> <!-- /#content-area -->

        

          
          
      </div> <!-- /content-inner /content -->

            
        <?php if (!empty($primary_links) or !empty($secondary_links)): ?>
          <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "with-main-menu"; } if (!empty($secondary_links)) { print " with-sub-menu"; } ?>">
            <?php if (!empty($primary_links)){ print theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ?>
            <?php if (!empty($secondary_links)){ print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); } ?>
          </div> <!-- /navigation -->
        <?php endif; ?>

       
		  <!-- ______________________ COLONNE DROITE _______________________ -->
        <?php if ($right): ?>
         <!--debut du contenu droit -->
		<div id="right-content-vie-lycee">
			
				
            <?php //print $right; ?>
        </div>
        <?php endif; ?> <!-- /sidebar-right -->

   
    	 <br clear="all"/>
         <!-- ______________________ CONTENU BAS _______________________ -->
<?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>
	 </div> <!-- /contentPage -->
	  
	  <?php include "inc_footer.php";?>
         <?php endif; ?>
     