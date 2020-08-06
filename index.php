<?php 

require_once 'main.inc.php';
include_once ENGINE;
$engine = new engine();
$engine->load('Qtzl-lib');
<<<<<<< Upstream, based on branch 'bekermeye' of https://github.com/iquetzalcoatl/qtzl-lib.git
$engine->render();
$navbar = new navbar(NULL,'success');
=======
$engine->render();
$navbar = new navbar(NULL,'danger');
$navbar->addmenu('home', 'test', '#');
$navbar->addmenu('home2', NULL, NULL);
$navbar->addmenu('home3', 'test', '#');
$navbar->addmenu('home4', NULL, NULL);
echo $navbar->manualnavbar(NULL);
$test = 1;
$navbar = new navbar(NULL,'success');
>>>>>>> 48a1484 test

$navbar->addmenu('Casa', NULL, NULL);
$navbar->addmenu('Home', 'Init', '#');
$navbar->addmenu('Home', 'Init2', '#');

$navbar->addmenu('Casa2', NULL, NULL);
echo $navbar->manualnavbar();
var_dump($navbar->manualnavbar());
echo 'test pull merge :v';
?>
