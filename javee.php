<?php
require_once 'main.inc.php';
include_once QTZL_ENGINE;
$engine = new engine();
$engine->load('Qtzl-lib');

$navbar = new navbar(NULL);
$navbar->addmenu('home','test','#');
$navbar->addmenu('test','home','#');
echo $navbar->manualnavbar(NULL);

$dropdown = new dropdown(NULL,'Boton');
// $dropdown->add_item();
// $dropdown->add_item();
// $dropdown->add_item('3','#',FALSE,TRUE);
echo ($dropdown->render());

?>