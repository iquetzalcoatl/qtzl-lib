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
    
    function __construct($navbar=NULL,$icons=NULL,$lang='es'){
        if ($navbar==NULL) {
            $this->navbar = ' class="has-navbar-fixed-top';
        }else{
            $this->navbar = ' class="'.$navbar.'';
        }
        if ($icons==NULL) {
            $this->icons = ' fontsawsome-i2svg-active fontawesome-i2svg-complete"';
        }else{
            $this->icons = ' '.$icons.'"';
        }
        if ($lang==NULL){
            $this->lang = ' lang="es-MX"';
        }else{
            $this->lang = ' lang="'.$lang.'"';
        }
        $this->html_config = $this->navbar.$this->icons.$this->lang;
    }
    
    /**
     * qtzl-lib engine load function
     * @param $title string to set webpage title
     * @param $dir string to check currently folder
     * @param $source string set online or offline manually
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
            $this->js='js/fontsawesome.js';
        }
        $this->html ='
<!DOCTYPE html>
<html'.$this->html_config.'>
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
<script src="'.$this->js.'"></script>
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
    var $navbar;
    var $logo       = QTZL_logo;
    var $mode       = 'navbar';
    var $menus      = NULL;
    var $submenus   = NULL;
    
    /**
     * qtzl-lib navbar class
     * @param $mode string options available for navbar
     * <li><b>fixedtop</b>: for fix on top navbar</li>
     * <li><b>fixedbottom</b>: for fix on bottom navbar</li>
     * <li><b>transparent</b>: for no background navbar</li>
     * <li><b>transparent-fixedtop</b>: transparent and fixedtop navbar</li>
     * <li><b>transparent-fixedbottom</b>: transparent and fixedbottom navbar</li>
     * @param $color string options available color navbar
     * <li><b>primary</b>: color hsl(171, 100%, 41%)</li>
     * <li><b>link</b>: color hsl(217, 71%, 53%)</li>
     * <li><b>info</b>: color hsl(204, 86%, 53%)</li>
     * <li><b>success</b>: color hsl(141, 71%, 48%)</li>
     * <li><b>warning</b>: color hsl(48, 100%, 67%)</li>
     * <li><b>danger</b>: color hsl(348, 100%, 61%)</li>
     * <li><b>black</b>: color hsl(0, 0%, 4%)</li>
     * <li><b>dark</b>: color hsl(0, 0%, 21%)</li>
     * <li><b>light</b>: color hsl(0, 0%, 96%)</li>
     * <li><b>white</b>: color hsl(0, 0%, 100%)</li>
     * @return string
     * @example $navbar = new navbar();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function __construct($mode=NULL,$color=NULL){
        switch ($mode){
            case 'fixedtop':
                $this->mode = 'navbar is-fixed-top';
                break;
            case 'fixedbottom':
                $this->mode = 'navbar is-fixed-bottom';
                break;
            case 'transparent':
                $this->mode = 'navbar is-transparent';
                break;
            case 'transparent-fixedtop':
                $this->mode = 'navbar is-transparent is-fixed-top';
                break;
            case 'transparent-fixedbottom':
                $this->mode = 'navbar is-transparent is-fixed-bottom';
                break;
            default:
                $this->mode = 'navbar is-fixed-top';
                break;
        }
        switch ($color){
            case 'primary':
                $this->mode = $this->mode.' is-primary';
                break;
            case 'link':
                $this->mode = $this->mode.' is-link';
                break;
            case 'info':
                $this->mode = $this->mode.' is-info';
                break;
            case 'success':
                $this->mode = $this->mode.' is-success';
                break;
            case 'warning':
                $this->mode = $this->mode.' is-warning';
                break;
            case 'danger':
                $this->mode = $this->mode.' is-danger';
                break;
            case 'black':
                $this->mode = $this->mode.' is-black';
                break;
            case 'dark':
                $this->mode = $this->mode.' is-dark';
                break;
            case 'light':
                $this->mode = $this->mode.' is-light';
                break;
            case 'white':
                $this->mode = $this->mode.' is-white';
                break;
            default:
                $this->mode = $this->mode.' is-light';
                break;
        }
        $this->navbar='
<nav class="'.$this->mode.'" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <img src="'.$this->logo.'" width="112" height="28">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navibar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>';
    }
    //FIXME
    function autonavbar($dir,$company_name=NULL,$logo=NULL){
        
        
    }
    
    
    function manualnavbar(){
        $this->navbar.='
    <div id="navibar" class="navbar-menu">
        <div class="navbar-start">';
        if ($this->menu==NULL) {
            //FIXME
            echo "you must add menus first";
            die();
        }else{
            $i=0;
            while ($i<count($this->menu)) {
                $ii=0;
                if($this->submenus[$this->menu[$i]]==NULL){
                    $this->navbar.= '
            <a class="navbar-item" href="'.$this->href[$this->menu[$i]][0].'">
                '.$this->menu[$i].'
            </a>';
                }else{
                    $this->navbar.='
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    '.$this->menu[$i].'
                </a>
                <div class="navbar-dropdown">';
                    while ($ii<=(count($this->submenus[$this->menu[$i]]))-1) {
                        $this->navbar.='
                    <a class="navbar-item" href="'.$this->href[$this->menu[$i]][$ii].'">
                        '.$this->submenus[$this->menu[$i]][$ii].'
                    </a>';
                        $ii++;
                    }
                    $this->navbar.='
                </div>
            </div>
        </div>';
                }
                $i++;
            }
        }
        
        $this->navbar.='
        <div class="navbar-end">
        </div>
        </div>
</nav>
<script>
document.addEventListener(\'DOMContentLoaded\', () => {
            
	  // Get all "navbar-burger" elements
	  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll(\'.navbar-burger\'), 0);
            
	  // Check if there are any navbar burgers
	  if ($navbarBurgers.length > 0) {
            
	    // Add a click event on each of them
	    $navbarBurgers.forEach( el => {
	      el.addEventListener(\'click\', () => {
            
	        // Get the target from the "data-target" attribute
	        const target = el.dataset.target;
	        const $target = document.getElementById(target);
            
	        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
	        el.classList.toggle(\'is-active\');
	        $target.classList.toggle(\'is-active\');
            
	      });
	    });
	  }
            
	});
</script>';
        
        return $this->navbar;
    }
    
    function addmenu($menu,$submenu,$href){
        unset($this->submenus[0]);
        if (!isset($this->submenus[$menu])) {
            if ($submenu==NULL) {
                $this->submenus[$menu]= $submenu;
            }else{
                $this->submenus[$menu][]= $submenu;
            }
        }else{
            $this->submenus[$menu][]= $submenu;
        }
        if (!isset($this->href[$menu])) {
            if ($href==NULL) {
                $this->href[$menu]= $href;
            }else{
                $this->href[$menu][]= $href;
            }
            
        }else{
            $this->href[$menu][]= $href;
        }
        $this->menu = array_keys($this->submenus);
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

}

/**
 * qtzl-lib class box
 * @desc is simply a container with a shadow, a border, 
 * a radius, and some padding.
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class box{
    private $init = '';
    private $body = '';
    private $end = '';
    private $isRender = FALSE;
    
    /**
     * qtzl-lib class box
     * @desc creates a box and initializes the html code
     * @example $box = new box();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function __construct() {
        $this->init = '
<div class="box">
        ';
        $this->end = '
</div>
        ';
    }
    
    /**
     * qtzl-lib box addItem function
     * @desc adds a single or an array of items into the box 
     * @param $item string to add a new element to the box
     * @example $box = new box(); $box->addItem($item);
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function addItem($item=NULL) {
        if ($this->isRender == FALSE) {
            
            if ($item != NULL) {
                if (!is_array($item)) {
                    
                    $item = array($item);
                }
                
                for ($i = 0; $i < count($item); $i++) {
                    
                    $this->body .= $item[$i];
                }
            }
        }
    }
    
    /**
     * qtzl-lib box render function
     * @desc assembles all parts of the box and returns all the html code
     * @return string
     * @example $box = new box(); $box->render();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function render() {
        if ($this->isRender == FALSE) {
            $box = $this->init.$this->body.$this->end;
            $this->isRender = TRUE;
            return $box;
        }
    }
    
    /**
     * qtzl-lib box mediaBox function
     * @desc creates a customizable media box template
     * @param $image string to set image source
     * @param $title string to set box title
     * @param $account string to set box secondary title
     * @param $timestap string to set a timestamp
     * @param $text string to set box text
     * @param $icon string to set box icons from FontAwesome5 library
     * @example $box = new box(); $box->mediaBox($image, $title, $account, $timestap, $text, $icon);
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function mediaBox($image=NULL, $title=NULL, $account=NULL, $timestap=NULL, $text=NULL, $icon=NULL) {
        if ($this->isRender == FALSE) {
                $this->body .= '
    <article class="media">
                ';
                
                if ($image != NULL){
                    $this->body .= '
        <div class="media-left">
          <figure class="image is-64x64">
            <img src="'.$image.'" alt="Image">
          </figure>
        </div>
                    ';
                }
                
                $this->body .= '
        <div class="media-content">
          <div class="content">
            <p>
              <strong>'.$title.'</strong> <small>'.$account.'</small> <small>'.$timestap.'</small>
              <br>
              '.$text.'
            </p>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
                ';
                
                if ($icon != NULL) {
                    
                    if (!is_array($icon)) {
                        
                        $icon = array($icon);
                    }
                    
                    for ($i = 0; $i < count($icon); $i++) {
                        $this->body .= '
              <a class="level-item" aria-label="'.$icon[$i].'">
                <span class="icon is-small">
                  <i class="fas fa-'.$icon[$i].'" aria-hidden="true"></i>
                </span>
              </a>
                        ';
                    }
                }
                
                $this->body .= '
            </div>
          </nav>
        </div>
    </article>
                ';
                
            }
        }
       
}
