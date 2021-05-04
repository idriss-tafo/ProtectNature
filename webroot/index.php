<?php
$t_debut = microtime(true);

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT . DS . 'controller' . DS . 'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE . DS . 'Include.php';
//die(CORE . DS . 'Include.php');
//die(BASE_URL);
new dispatcher();
//debug("je passe la")
//phpinfo();

?>

<div style="position:fixed;bottom:0;background:#808080;
color:#FFF;line-height:30px; height:30px;
right:0; padding-left:10px;padding-right:10px;">
  <?php
  echo 'page generée en: ' . round(microtime(true) - $t_debut, 5) . 'secondes';
  ?>

</div>