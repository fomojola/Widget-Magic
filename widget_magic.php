<?php
/**
 * @package Widget Magic
 * @version 1.0.0
 */
/*
Plugin Name: Widget Magic
Plugin URI: https://github.com/fomojola/Widget-Magic
Description: Implements a set of WordPress shortcodes and theme additions that allow widget content (initially just sidebars but eventually any text) to be used in any page or post using simple shortcodes.
Author: IdeaSynthesis LLC
Version: 1.0.0
Author URI: http://www.ideasynthesis.com/
*/
if ( !function_exists( 'add_action' ) ) {
  exit;
}

function show_selected_sidebar($atts)
{
  extract(shortcode_atts(array(
                               'id' => FALSE
                               ), $atts));
  $output = "";
  if($id){
    ob_start();
    dynamic_sidebar($id);
    $output = ob_get_contents();
    ob_end_clean();
  }
  return $output;
}
add_shortcode('show_sidebar','show_selected_sidebar');