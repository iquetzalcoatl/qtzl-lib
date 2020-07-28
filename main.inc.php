<?php
/*
 * Copyright (C) 2020   Javier Garrido  <javier-garrido@live.com>
 * Copyright (C) 2020   Enrique Canto   <eacm97@hotmail.com>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/** 
 * You must set manually this settings
 */
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Conten-Type: text/html;charset=utf-8");
date_default_timezone_set('America/Monterrey');

define('ROOT', basename(__DIR__),TRUE);
define('ROOT_PATH', str_replace('\\', '/',__DIR__.'/'));
define('MODULES_PATH',ROOT_PATH.'modules');
define('ENGINE', ROOT_PATH.'core/qtzl.lib.php');
define('QTZL_ver', '1.2007');
define('QTZL_codename', 'Bekermeye');
define('QTZL_company', 'Dev');
define('QTZL_logo', 'core/logo.png');

define('DEBUG_MODE', TRUE);
if (DEBUG_MODE!=FALSE) {
    ini_set("xdebug.var_display_max_children", -1);
    ini_set("xdebug.var_display_max_data", -1);
    ini_set("xdebug.var_display_max_depth", -1);
    ini_set('error_reporting', E_ALL);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    ini_set('display_errors', 1);
}



