<?php
/**
 * @package cpukiller
 * @version 1.0
 */
/*
Plugin Name: cpukiller
Plugin URI: https://github.com/jordiprats/wordpress-cpukiller
Description: CPU killer for demo purposes
Author: Jordi Prats
Version: 1.0
Author URI: http://systemadmin.es
*/

add_filter('the_content', 'cpukiller_content', 1);

function cpukiller_content($content) {
  


  return $content;
}

?>
