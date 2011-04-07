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
//Webform "You have already submitted this form." message off
function cyrano_er_webform_view_messages($node, $teaser, $page, $submission_count, $limit_exceeded, $allowed_roles) {
  theme_webform_view_messages($node, $teaser, $page, 0, $limit_exceeded, $allowed_roles);
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