<?php
function debug($val)
{
  if(Conf::$debug>0){
    $debug = debug_backtrace();
    echo '<p><a href="#" onclick="$(this).parent().next
     (\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> 1.'.$debug[0]['line'].'<a/></p>';
    echo '<ol style="display:none;">';
    foreach ($debug as $key => $value) {
      if($key>0){
        echo '<li><strong>'.$value['file'].' </strong> 1.'.$value['line'].'</li>';
      }
    }
    echo '</ol>';
    echo "j'en ais termine avec tous ce tralala";
    echo '<pre>';
    print_r($val);
    echo '</pre>';
  }

}
