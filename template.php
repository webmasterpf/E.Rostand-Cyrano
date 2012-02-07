<?php
// permet template suggestions avec page-
function phptemplate_preprocess(&$vars, $hook)
{
  switch($hook)
  {
      case 'page' :
      if (arg(0) == 'node')
      {
        $vars['template_files'][]  = 'page-' . $vars['node']->type;
      }
      break;

  }
}
?>
<?php
//Pour afficher une seule taxonomie non cliquable - http://drupal.org/node/823918
// Solution interessante aussi : http://drupal.org/node/133223
function THEME_NAME_preprocess_node(&$vars) {
  $node = $vars['node'];
  $vars['template_file'] = 'node-'. $node->nid;
  $wanted_vid = 7;//Choisir ici le vid voulu,
  foreach($node->taxonomy as $term) {
    if ( $wanted_vid == $term->vid ) {
      $vars['my_terms'] .= $term->name; //You would need to format this the way you want it displayed, or pass it to a theme function
      //Changer le nom de la fonction si l'on ne se sert pas toujours du meme vid
    }
  }
}
?>
<?php
/*Permet d'attribuer un template de node différent selon terme de taxo et type de contenu
 * - NE PAS OUBLIER DE CHANGER LE NOM DU THEME !!!___
http://drupal.org/node/723544 ET http://drupalfr.org/forum/support/developpement/26735-theming-template-commun-95*/
//nettoyage du nom pour usage dans tpl
function valideChaine($term){
$term = preg_replace('<code>\s+</code>', '<em>', trim($term));
  $term = str_replace("'", "</em>", $term);
  $term = preg_replace('<code>_+</code>', '</em>', trim($term));
  $NomTermeValide=strtr($term,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
  "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
  return ($NomTermeValide);
}
function cyrano_er_preprocess_node(&$vars, $hook) {
//Partie regions dans node.tpl- ajoute les regions utiles au node.tpl
 $vars['pole_bloc_G'] = theme('blocks', 'pole_bloc_G');
 $vars['pole_bloc_C'] = theme('blocks', 'pole_bloc_C');
 $vars['pole_bloc_D'] = theme('blocks', 'pole_bloc_D');
 $vars['col_G1'] = theme('blocks', 'col_G1');
 $vars['col_G2'] = theme('blocks', 'col_G2');
 $vars['col_G3'] = theme('blocks', 'col_G3');
 //
//Partie template node.tpl
$node = $vars['node'];
$lesTypes=array('fiche_formation', 'page_pole','contenu_actualites');
//ajouter les vids possibles pour chaque quelquesoit le type
/* vid 1 pour pole formation
 * vid 2 pour évènement
 * vid 3 pour
 * vid 5 pour type actualite
 * vid 6 type de formation
 *
*/
$lesVid=array('1','6');
// on regarde si le type est dans le tableau
if ( in_array($node->type,$lesTypes) ) {
       if ( ! empty($node->taxonomy)  ) {
// Récupération du 1er element du tableau
           $term = array_shift($node->taxonomy);
    // verifie si l'un des termes appartiennent bien à l'un des vid définis dans le tableau
           if ( in_array($term->vid,$lesVid) ) {

              $tplfile = 'node-'.$node->type.'-'. $term->vid.'-'.$term->tid ;
              $vars['template_files'][] = $tplfile ;
          //drupal_set_message('Term name : '.$term->name,'status');
          // drupal_set_message('Template file : '.$tplfile.'.tpl.php','status');
          }


      }
 //drupal_set_message('Type du node hors : '.$node->type,'status');
// drupal_set_message('Term name hors : '.$term->name,'status');
    }
}
?>
<?php
// fonction pour avoir la possibilité de faire un template pour page recherche
function phptemplate_preprocess_page(&$vars) {
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $vars['template_files'][] = $template_filename;
      }
    }
  }
}
?>
<?php
// permet le debugage de php avec drupal
function debug_print($var) {
  drupal_set_message('<pre>'. print_r($var, TRUE) .'</pre>');
}
// Webform "You have already submitted this form." message off.
function theme_name_webform_view_messages($node, $teaser, $page, $submission_count, $limit_exceeded, $allowed_roles, $closed, $cached) {
  return theme_webform_view_messages($node, $teaser, $page, 0, $limit_exceeded, $allowed_roles, $closed, $cached);
}
?>
<?php
// permet d'ouvrir en blank les fichiers uploadés via filefield
//NE PAS OUBLIER DE CHANGER NOM DU THEME !!!
function cyrano_er_filefield_file($file) {
  // Views may call this function with a NULL value, return an empty string.
  if (empty($file['fid'])) {
    return '';
  }

  $path = $file['filepath'];
  $url = file_create_url($path);
  $icon = theme('filefield_icon', $file);

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  // TODO: Possibly move to until I move to the more complex format described
  // at http://darrelopry.com/story/microformats-and-media-rfc-if-you-js-or-css
  $options = array(
    'attributes' => array(
      'type' => $file['filemime'] . '; length=' . $file['filesize'],
    ),
  );

  // Use the description as the link text if available.
  if (empty($file['data']['description'])) {
    $link_text = $file['filename'];
  }
  else {
    $link_text = $file['data']['description'];
    $options['attributes']['title'] = $file['filename'];
  }
//open allfiles in new window
$options['attributes']['target'] = '_blank';

  return '<div class="filefield-file clear-block">'. $icon . l($link_text, $url, $options) .'</div>';
}
?>
<?php
/*_______________FONCTIONS POUR ACTION SUR AGGREGATOR____________*/
/* modify link items in the aggregator to open in a new window and
suppress the "blog it" icon & links should the module ever be enabled.
(Code removed--not commented out--from this copy of the original function.)
 * drupal.org/node/573054 */

function phptemplate_aggregator_block_item($item, $feed = 0) {
  global $user;

  $output = '';

  // Display the external link to the item.
  $output .= '<a href="'. check_url($item->link) .'" target="_blank">'. check_plain($item->title) ."</a>\n";

  return $output;
}
/**Enleve le lien en savoir plus - NE PAS OUBLIER DE CHANGER LE NOM DU THEME !!!___*/
function cyrano_er_more_link ($url, $title) {
  if (stristr( $url, 'aggregator')) {
    return "";
  }
}
?>