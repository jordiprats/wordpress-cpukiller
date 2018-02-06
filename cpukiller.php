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

function get_CPUs()
{
  $totalCPUs = 1;
  if (is_file('/proc/cpuinfo'))
  {
    $cpuinfo = file_get_contents('/proc/cpuinfo');
    preg_match_all('/^processor/m', $cpuinfo, $matches);
    $totalCPUs = count($matches[0]);
  }
  else
  {
    $process = @popen('sysctl -a', 'rb');
    if (false !== $process)
    {
      $output = stream_get_contents($process);
      preg_match('/hw.ncpu: (\d+)/', $output, $matches);
      if ($matches)
      {
        $totalCPUs = intval($matches[1][0]);
      }
      pclose($process);
    }
  }

  return $totalCPUs;
}

function do_math($content)
{
  $rand=rand(1,100);

  for($i=0; $i<rand(9999,99999); $i++)
  {
    for($j=0; $j<rand(9999,99999); $j++)
    {
      for($x=0; $x<rand(9999,99999); $x++)
      {
        for($y=0; $y<rand(9999,99999); $y++)
        {
          $rand=$j*acos((float)rand(9999,9999999))+
                $i*sqrt((float)rand(9999,9999999))+
                $x*acos((float)rand(9999,9999999))+
                $y*sqrt((float)rand(9999,9999999));
        }
      }
    }
  }

  return $content."<h3><center><strong>".$rand."</strong></center></h3><p><center>CPU killer=true</center></p>";
}

function cpukiller_content($content)
{
  for($i=0; $i<get_CPUs()*4; $i++)
  {
    $pid = pcntl_fork();
    if ($pid == -1)
    {
      die('could not fork');
    }
    else if ($pid)
    {
      # primari
    }
    else
    {
      // child
      return do_math($content);
    }
  }
}

?>
