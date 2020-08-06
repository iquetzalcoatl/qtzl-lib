<?php 

require_once 'main.inc.php';
include_once ENGINE;
$engine = new engine();
$engine->load('Qtzl-lib');
$engine->render();
$navbar = new navbar(NULL,'success');

$navbar->addmenu('Casa', NULL, NULL);
$navbar->addmenu('Home', 'Init', '#');
$navbar->addmenu('Home', 'Init2', '#');

$navbar->addmenu('Casa2', NULL, NULL);
echo $navbar->manualnavbar();
var_dump($navbar->manualnavbar());
?>
