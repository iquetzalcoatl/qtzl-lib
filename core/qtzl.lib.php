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
    var $logo = QTZL_logo;
    var $mode = 'navbar';
    
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
    <div class="navbar-start">
        <a class="navbar-item">
            <img src="'.$this->logo.'" width="112" height="28">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navibar">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>';
    }
    //FIXME
    function autonavbar($dir,$company_name=NULL,$logo=NULL){
        

    }
    
    
    function manualnavbar($menu){
        $this->navbar.='
        <div id="navibar" class="navbar-menu">
            <div class="navbar-start">';
        
        $this->navbar.='
            </div>
        </div>
    </div>
</nav>';
        
        return $this->navbar;
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

/**
 * qtzl-lib class box
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class box{
    private $box = '';
    var $title = '';
    var $account = '';
    var $text = '';
    var $image = '';
    var $timestamp = '';
    var $icons = '';
    
    function __construct($title, $account, $text, $image, $timestamp=NULL,$iconless=FALSE){
        $this->title = $title;
        $this->account = $account;
        $this->text = $text;
        $this->image = $image;
        $this->timestamp = $timestamp;
        $this->box .= '
                <div class="box">
                  <article class="media">
                    <div class="media-left">
                      <figure class="image is-64x64">
                        <img src="'.$this->image.'" alt="Image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <div class="content">
                        <p>
                          <strong>'.$this->title.'</strong> <small>@'.$this->account.'</small> <small>'.$this->timestamp.'</small>
                          <br>
                          '.$this->text.'
                        </p>
                      </div>
                      <nav class="level is-mobile">
                        <div class="level-left">
        ';
        
        if ($iconless == FALSE) {
            $this->box .= '
                  <a class="level-item" aria-label="reply">
                    <span class="icon is-small">
                      <i class="fas fa-reply" aria-hidden="true"></i>
                    </span>
                  </a>
                  <a class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                      <i class="fas fa-retweet" aria-hidden="true"></i>
                    </span>
                  </a>
                  <a class="level-item" aria-label="like">
                    <span class="icon is-small">
                      <i class="fas fa-heart" aria-hidden="true"></i>
                    </span>
                  </a>
            ';
        }
    }
    
    /**
     * qtzl-lib box addIcon function
     * @param $icons string get the icon(s) from FontAwesome library
     * @return string
     * @example $box = new box(); $box->addIcon($icons);
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function addIcon($icons) {
        $this->icons = $icons;
        
        if (!is_array($this->icons)) {
            $nameIcon = array($this->icons);
        }
        
        for ($i = 0; $i < count($this->icons); $i++) {
            $this->box .= '
              <a class="level-item" aria-label="'.$this->icons[$i].'">
                <span class="icon is-small">
                  <i class="fas fa-'.$this->icons[$i].'" aria-hidden="true"></i>
                </span>
              </a>
            ';
            
        }

        return $this->box;
    }
    
    /**
     * qtzl-lib box render function
     * @return string
     * @example $box = new box(); $box->render();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function render() {
        $this->box .= '
                    </div>
                  </nav>
                </div>
              </article>
            </div>

        ';
        
        return $this->box;
    }
}
