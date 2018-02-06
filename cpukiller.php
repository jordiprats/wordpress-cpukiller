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

function cpukiller_content($content)
{
  $rand=rand (1,100);

  for($i=0; $i<rand(9999,99999); $i++)
  {
    for($j=0; $j<rand(9999,99999); $j++)
    {
      for($x=0; $x<rand(9999,99999); $x++)
      {
        for($y=0; $y<rand(9999,99999); $y++)
        {
          $rand=$j*acos((float)rand (9999,9999999))+
                $i*sqrt((float)rand (9999,9999999))+
                $x*acos((float)rand (9999,9999999))+
                $y*sqrt((float)rand (9999,9999999));
        }
      }
    }
  }

  return $content."<h3><center><strong>".$rand."</strong></center></h3><p><center>CPU killer=true</center></p>";
}

?>
