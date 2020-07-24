<?php

require_once 'main.inc.php';
include_once ENGINE;
$engine = new engine();
$engine->load('Qtzl-lib');
$engine->render();
echo "hello";
