<?php
$title_for_layout = $page->name; ?>
<h1><?php echo $page->name; ?></h1>
<?php
require ROOT . DS . 'view' . DS . 'pages' . DS . $page->name . '.php';

?>