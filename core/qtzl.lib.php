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
 * qtzl-lib class engine 
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class engine{
    var $title;
    var $dir;
    var $html;
    private $css;
    private $map;
    
    function __construct(){
        
    }
    
    /**
     * qtzl-lib engine load function
     * @param $title string to set webpage title
     * @param $dir string to check currently folder
     * @param $source set online or offline manually
     * @return string
     * @example $engine = new engine(); $engine->load();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function load($title=NULL,$dir=NULL,$source=NULL){
        if ($title==NULL) {
            $this->title = 'main';
        }else{
            $this->title = $title;
        }
        if ($dir==NULL) {
            $this->dir = __DIR__;
        }else{
            $this->dir = $dir;
        }
        if ($source==NULL) {
            if (!$sock=@fsockopen('www.google.com',80,$num,$error, 5)) {
                $this->connection = 'offline';
            }else{
                $this->connection = 'online';
            }
        }else{
            switch ($source) {
                case 'manual-online':
                    $this->connection = 'online';
                    break;
                case 'manual-offline':
                    $this->connection = 'offline';
                    break;
            }
        }
        if ($this->connection=='online') {
            $this->css='https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css';
            $this->map='https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.css.map';
            $this->js='https://kit.fontawesome.com/df83b7e0ad.js" crossorigin="anonymous';
        }else{
            $this->css='css/bulma.css';
            $this->map='css/bulma.css.map';
            $this->js='js/fontawesome.js';
        }
        $this->html ='
<!DOCTYPE html>
<html>
<head>
	<title>'.$this->title.'</title>
    <meta name="msapplication-TileColor" content="#F0F0F0">
    <meta name="theme-color" content="#F0F0F0">
    <meta name="apple-mobile-web-app-status-bar-style" content="#F0F0F0">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="'.$this->css.'">
    <link rel="stylesheet" type="text/css" href="'.$this->map.'">
</head>
<body>
<script src=""></script>
</body>
</html>
';
        return $this->html;
    }
    
    /**
     * qtzl-lib engine render function
     * @return string
     * @example $engine = new engine(); $engine->render();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function render() {
        echo $this->html;
    }
}

/**
 * qtzl-lib class navbar
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class navbar{
    function __construct(){
        
    }
}

/**
 * qtzl-lib class button
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class button{
    function __construct(){
        
        
    }
}

/**
 * qtzl-lib class form
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class form{
    function __construct(){
        
    }
}

/**
 * qtzl-lib class columns
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class columns{
    function __construct(){
        
    }
}




