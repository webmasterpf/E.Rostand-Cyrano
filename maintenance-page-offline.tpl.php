<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
  $head_title = 'Lyc&eacute;e Provence Formation :: Site-offline';
  $logo = '/drupal6/sites/all/themes/Celony_cyrano/images/logo_celony.gif';

  // If your theme is set to display the site name, uncomment this line and replace the value:
   $site_name = 'Le site du lyc&eacute;e';

  // If your theme is set to *not* display the site name, uncomment this line:
  unset($site_name);

  // If your theme is set to display the site slogan, uncomment this line and replace the value:
  $site_slogan = 'Lyc&eacute;e Priv&eacute; Technologique et Professionnel';

  // If your theme is set to *not* display the site slogan, uncomment this line:
  // unset($site_slogan);

  // Main message. Note HTML markup.
  $content = "<p>Le site rencontre actuellement des probl&egrave;mes techniques, veuillez nous en excuser.</p><hr /><p>Si vous en &ecirc;tes l'administrateur, veuillez v&eacute;rifier les acc&egrave;s &agrave; votre base de donn&eacute;es </p>";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
    <body class="<?php print $body_classes; ?>">

    <!-- TEMPLATE PAGE MAINTENANCE DE BASE  -->
  <div id="page">
    <div id="header">
      <div id="logo-title">

        <?php if (!empty($logo)): ?>
          <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <div id="name-and-slogan-offline">
          <?php if (!empty($site_name)): ?>
            <h1 id="site-name">
              <a href="<?php print $base_path ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>

          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan-offline"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /name-and-slogan -->
      </div> <!-- /logo-title -->

      <?php if (!empty($header)): ?>
        <div id="header-region">
          <?php print $header; ?>
        </div>
      <?php endif; ?>

    </div> <!-- /header -->
 <!-- ______________________ LAYOUT PAGE OFFLINE _______________________ -->
  <!-- ______________________ CONTENU _______________________ -->

      <div id="contentPage-offline">


		  <!-- ______________________ CONTENU CENTRAL _______________________ -->
          <div id="middle-content">
             <?php
// Main message.  Note HTML markup.
print $content;
    ?>
              <?php print $feed_icons; ?>
          </div> <!-- /#content-area -->





      </div> <!-- /content-inner /content -->





    	 <br clear="all"/>
         <!-- ______________________ CONTENU BAS _______________________ -->
         <div id="footer-offline">


         </div>
    </body>
</html>

         