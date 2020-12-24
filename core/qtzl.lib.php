<?php

/*
 * Copyright (C) 2020 Javier Garrido <javier-garrido@live.com>
 * Copyright (C) 2020 Enrique Canto <eacm97@hotmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
function qtzl_location(){

	$location = str_replace('\\','/',getcwd());
	$location = strstr($location,ROOT);
	$location = explode('/',$location);
	$relpath = $location;
	foreach($location as $path=>$dir){
		if(ROOT===$location[$path]){
			array_shift($relpath);
		}else{
			$relpath = str_replace($location[$path],'..',$relpath);
		}
	}
	$relpath = implode('/',$relpath).'/';
	return $relpath;

}

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

	function __construct($navbar = NULL,$icons = NULL,$lang = 'es'){

		if($navbar==NULL){
			$this->navbar = ' class="has-navbar-fixed-top';
		}else{
			$this->navbar = ' class="'.$navbar.'';
		}
		if($icons==NULL){
			$this->icons = ' fontsawsome-i2svg-active fontawesome-i2svg-complete"';
		}else{
			$this->icons = ' '.$icons.'"';
		}
		if($lang==NULL){
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
	function load($title = NULL,$source = NULL){

		if($title==NULL){
			$this->title = ucwords(basename(__FILE__,'.php'));
		}else{
			$this->title = $title;
		}
		if($source==NULL){
			if(!$sock = @fsockopen('www.google.com',80,$num,$error,5)){
				$this->connection = 'offline';
			}else{
				$this->connection = 'online';
			}
		}else{
			switch($source){
				case 'manual-online':
					$this->connection = 'online';
					break;
				case 'manual-offline':
					$this->connection = 'offline';
					break;
			}
		}
		if(in_array('main.inc.php',scandir(getcwd()))){
			$this->path = '';
			$this->location = qtzl_location().ROOT.'/';
		}else{
			$this->path = qtzl_location();
			$this->location = qtzl_location();
		}
		if($this->connection=='online'){
			$this->css = 'https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css';
			$this->map = 'https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.css.map';
			$this->css_extra = $this->location.'core/css/extra.css';
			$this->icons = 'https://kit.fontawesome.com/df83b7e0ad.js" crossorigin="anonymous';
			$this->js = 'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.0/dist/bulma.js';
		}else{
			$this->css = $this->location.'core/css/bulma.css';
			$this->map = $this->location.'core/css/bulma.css.map';
			$this->css_extra = $this->location.'core/css/extra.css';
			$this->icons = $this->location.'core/js/fontsawesome.js';
			$this->js = $this->location.'core/js/bulma.js';
		}

		$this->html = '
<!DOCTYPE html>
<html'.$this->html_config.'>
<head>
	<title>'.$this->title.
			'</title>
	<link rel="apple-touch-icon" sizes="180x180" href="'.$this->path.
			'core/img/favicon/apple-touch-ico.png">
	<link rel="icon" type="image/png" sizes="32x32" href="'.$this->path.
			'core/img/favicon//favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="'.$this->path.
			'core/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="'.$this->path.
			'core/img/favicon/site.webmanifest">
	<meta name="msapplication-TileColor" content="#F0F0F0">
	<meta name="theme-color" content="#F0F0F0">
	<meta name="apple-mobile-web-app-status-bar-style" content="#F0F0F0">
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="'.$this->css.
			'">
<link rel="stylesheet" type="text/css" href="'.$this->css_extra.
			'">

</head>
<body>
<script src="'.$this->icons.'"></script>
<script src="'.$this->js.'"></script>
';

	}

	function render(){

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

	var $mode = 'navbar';

	var $menus = NULL;

	var $submenus = NULL;

	/**
	 * qtzl-lib navbar class
	 * @param $mode string options available for navbar
	 * <li><b>fixedtop</b>: for fix on top navbar</li>
	 * <li><b>fixedbottom</b>: for fix on bottom navbar</li>
	 * <li><b>transparent</b>: for no background navbar</li>
	 * <li><b>transparent-fixedtop</b>: transparent and fixedtop navbar</li>
	 * <li><b>transparent-fixedbottom</b>: transparent and fixedbottom
	 * navbar</li>
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
	function __construct($mode = NULL,$color = NULL){

		if(in_array('main.inc.php',scandir(getcwd()))){
			$this->logo = 'core/img/logo.png';
		}else{
			$this->logo = qtzl_location().'core/img/logo.png';
		}
		switch($mode){
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
		switch($color){
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
		$this->navbar = '
<nav class="'.$this->mode.
			'" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<a class="navbar-item">
			<img src="'.$this->logo.
			'" width="112" height="28">
		</a>
		<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navibar">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	</div>';

	}

	// FIXME
	function autonavbar($dir,$company_name = NULL,$logo = NULL){


	}

	function manualnavbar(){

		$this->navbar .= '
    <div id="navibar" class="navbar-menu">
        <div class="navbar-start">';
		if($this->menu==NULL){
			// FIXME
			echo "you must add menus first";
			die();
		}else{
			$i = 0;
			while($i<count($this->menu)){
				$ii = 0;
				if($this->submenus[$this->menu[$i]]==NULL){
					$this->navbar .= '
			<a class="navbar-item" href="'.$this->href[$this->menu[$i]][0].'">
				'.$this->menu[$i].'
			</a>';
				}else{
					$this->navbar .= '
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link">
					'.$this->menu[$i].'
				</a>
				<div class="navbar-dropdown">';
					while($ii<=(count($this->submenus[$this->menu[$i]]))-1){
						$this->navbar .= '
					<a class="navbar-item" href="'.$this->href[$this->menu[$i]][$ii].'">
					'.$this->submenus[$this->menu[$i]][$ii].'
					</a>';
						$ii++;
					}
					$this->navbar .= '
                </div>
            </div>';
				}
				$i++;
			}
		}

		$this->navbar .= '
        </div>
        <div class="navbar-end">
        </div>
    </div>
</nav>
</script>';

		return $this->navbar;

	}

	function addmenu($menu,$submenu,$href){

		unset($this->submenus[0]);
		if(!isset($this->submenus[$menu])){
			if($submenu==NULL){
				$this->submenus[$menu] = $submenu;
			}else{
				$this->submenus[$menu][] = $submenu;
			}
		}else{
			$this->submenus[$menu][] = $submenu;
		}
		if(!isset($this->href[$menu])){
			if($href==NULL){
				$this->href[$menu] = $href;
			}else{
				$this->href[$menu][] = $href;
			}
		}else{
			$this->href[$menu][] = $href;
		}
		$this->menu = array_keys($this->submenus);

	}

	function render($output = TRUE){

		if(isset($this->navbar)){
			if($output!=TRUE){
				return $this->navbar;
			}else{
				echo ($this->navbar);
			}
		}else{
			$this->manualnavbar();
			$this->addmenu('menu','submenu','#');
			if($output!=TRUE){
				return $this->navbar;
			}else{
				echo $this->navbar;
			}
		}

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

	private $text = '';

	private $class = '';

	private $html = '';

	function __construct($text = NULL,$mods = NULL){

		$this->text = $text;
		$this->class = $mods;
		$this->html = '<button class="button';

		if($this->class!=NULL){
			if(!is_array($this->class)){
				$this->class = array($this->class);
			}

			for($i = 0;$i<count($this->class);$i++){
				$concat = ' is-'.$this->class[$i];
				$this->html .= $concat;
			}
		}

		$this->html .= '">';

	}

	function addIcon($icon,$size = NULL){

		// FIXME add feature to add icons to the right of the text
		$this->html .= '
        <span class="icon '.$size.'">
        <i class="fas fa-'.$icon.'"></i>
        </span>
        ';

	}

	function render(){

		$concat = '<span>'.$this->text.'</span>';
		$this->html .= $concat.'</button>';
		return $this->html;

	}

}

/**
 * qtzl-lib class box is simply a container with a shadow,
 * a border,a radius, and some padding.
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
	 * creates a box and initializes the html code
	 * @example $box = new box();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct(){

		$this->init = '
<div class="box">
        ';
		$this->end = '
</div>
        ';

	}

	/**
	 * qtzl-lib box addItem function
	 * adds a single or an array of items into the box
	 * @param $item string to add a new element to the box
	 * @example $box = new box(); $box->addItem($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL){

		if($this->isRender==FALSE){

			if($item!=NULL){
				if(!is_array($item)){

					$item = array($item);
				}

				for($i = 0;$i<count($item);$i++){

					$this->body .= $item[$i];
				}
			}
		}

	}

	/**
	 * qtzl-lib box render function
	 * assembles all parts of the box and returns all the html code
	 * @return string
	 * @example $box = new box(); $box->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		if($this->isRender==FALSE){
			$box = $this->init.$this->body.$this->end;
			$this->isRender = TRUE;
			return $box;
		}

	}

	/**
	 * qtzl-lib box mediaBox function creates a customizable media box template
	 * @param $image string to set image source
	 * @param $title stringto set box title
	 * @param $account string to set box secondary title
	 * @param $timestap string to set a timestamp
	 * @param $text string to set box text
	 * @param $icon string to set box icons from FontAwesome5 library
	 * @example $box = new box(); $box->mediaBox($image, $title, $account,
	 * $timestap, $text, $icon);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function mediaBox($image = NULL,$title = NULL,$account = NULL,
		$timestap = NULL,$text = NULL,$icon = NULL){

		if($this->isRender==FALSE){
			$this->body .= '
    <article class="media">
                ';

			if($image!=NULL){
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
					<strong>'.$title.'</strong> <small>'.$account.'</small> <small>'.$timestap.
				'</small>
					<br>
				'.$text.
				'
				</p>
			</div>
		<nav class="level is-mobile">
			<div class="level-left">
				';

			if($icon!=NULL){

				if(!is_array($icon)){

					$icon = array($icon);
				}

				for($i = 0;$i<count($icon);$i++){
					$this->body .= '
              <a class="level-item" aria-label="'.$icon[$i].
						'">
                <span class="icon is-small">
                  <i class="fas fa-'.$icon[$i].
						'" aria-hidden="true"></i>
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

/**
 * qtzl-lib class dropdown
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class dropdown{

	protected $is;

	protected $title;

	public $dropdown;

	protected $arrow;

	protected $item;

	protected $href;

	function __construct($is = NULL,$title = NULL){

		switch($is){
			case 'active':
				$this->is = ' is-active';
				$this->arrow = 'fas fa-angle-down';
				break;
			case 'right':
				$this->is = ' is-active is-right';
				$this->arrow = 'fas fa-angle-down';
				break;
			case 'left':
				$this->is = ' is-active is-left';
				$this->arrow = 'fas fa-angle-down';
				break;
			case 'up':
				$this->is = ' is -active is-up';
				$this->arrow = 'fas fa-angle-up';
				break;
			default:
				$this->is = '';
				$this->arrow = 'fas fa-angle-down';
				break;
		}
		if($title==NULL){
			$this->title = 'Dropdown button';
		}else{
			$this->title = $title;
		}
		$this->dropdown = '
<div class="dropdown'.$this->is.
			'">
	<div class="dropdown-trigger">
		<button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
			<span>'.$this->title.' </span>
			<span class="icon is-small">
			<i class="'.$this->arrow.
			'" aria-hidden="true"></i>
			</span>
		</button>
	</div>
	<div class="dropdown-menu" id="dropdown-menu" role="menu">
		<div class="dropdown-content">';

	}

	function add_item($item = NULL,$href = NULL,$active = FALSE,
		$divider = FALSE){

		if($item==NULL){
			$this->item['name'][] = 'item';
		}else{
			$this->item['name'][] = $item;
		}

		if($href==NULL){
			$this->item['href'][] = '#';
		}else{
			$this->item['href'][] = $href;
		}
		if($active==FALSE){
			$this->item['active'][] = 'dropdown-item';
		}else{
			$this->item['active'][] = 'dropdown-item is-active';
		}
		if($divider==FALSE){
			$this->item['divider'][] = '';
		}else{
			$this->item['divider'][] = '<hr class="dropdown-divider">';
		}

	}

	function render($output = TRUE){

		if($this->item==NULL){
			$this->dropdown .= '
			<a href="#" class="dropdown-item">
				No items added yet
			</a>
';
		}else{
			$i = 0;
			while($i<count($this->item['name'])){
				$this->dropdown .= '			'.$this->item['divider'][$i].'
			<a href="'.$this->item['href'][$i].'" class="'.$this->item['active'][$i].
					'">
				'.$this->item['name'][$i].'
			</a>';
				$i++;
			}
		}
		$this->dropdown .= '
		</div>
	</div>
</div>';
		if($output==TRUE){
			echo $this->dropdown;
		}else{
			return $this->dropdown;
		}

	}

}

/**
 * qtzl-lib class breadcrumb
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class breadcrumb{

	function __construct(){

		$this->breadcrumb = '
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>';

	}

	function additem($item = NULL,$href = NULL,$active = FALSE,$current = FALSE){

		if($item==NULL){
			$this->item['name'][] = 'item';
		}else{
			$this->item['name'][] = $item;
		}
		if($href==NULL){
			$this->item['href'][] = '#';
		}else{
			$this->item['href'][] = $href;
		}
		if($active==FALSE){
			$this->item['active'][] = '';
		}else{
			$this->item['active'][] = ' class="is-active"';
		}
		if($current==FALSE){
			$this->item['current'][] = '';
		}else{
			$this->item['current'][] = ' aria-current="page"';
		}

	}

	function render($output = TRUE){

		if(!isset($this->item)){
			$this->breadcrumb .= '
		<li><a href="#">Breadcrumb items not added yet</a></li>';
		}else{
			$i = 0;
			while($i<count($this->item['name'])){
				$this->breadcrumb .= '
		<li'.$this->item['active'][$i].'>
			<a href=""'.$this->item['current'][$i].'>
				'.$this->item['name'][$i].'
			</a>
		</li>';
				$i++;
			}
			$this->breadcrumb .= '
	</ul>
</nav>';
		}
		if($output==FALSE){
			return $this->breadcrumb;
		}else{
			echo $this->breadcrumb;
		}

	}

}

/**
 * qtzl-lib class card
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class card{

	protected $card = NULL;

	protected $card_img = NULL;

	protected $card_header = NULL;

	protected $card_content = NULL;

	protected $card_footer = NULL;

	/**
	 * qtzl-lib class card
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct(){

		$this->card = '
<div class="card">';

	}

	function cardImage($size = NULL,$src = NULL,$round = NULL){

		$this->card_img = '
	<div class="card-image">';
		$this->image = new image($size);
		$this->image->addImg($src,$round);
		$this->card_img .= $this->image->render(FALSE).'
	</div>';

	}

	function cardHeader($title = NULL,$icon = NULL,$href = NULL){

		if($title==NULL){
			$this->title = 'Card Title';
		}else{
			$this->title = $title;
		}
		$this->card_header = '
	<header class="card-header">
		<p class="card-header-title">
			'.$this->title.'
		</p>';
		if($icon!=NULL){
			$this->icon = $icon;
			if($href!=NULL){
				$this->href = $href;
			}else{
				$this->href = '#';
			}
			$this->card_header .= '
		<a href="'.$this->href.
				'" class="card-header-icon">
			<span class="icon">
				<i class="'.$this->icon.'"></i>
			</span>
		</a>';
		}
		$this->card_header .= '
	</header>';

	}

	function cardContent($content = NULL){

		$this->card_content = '
	<div class="card-content">
		<div class="content">
';
		if($content==NULL){
			$content = array(
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					Phasellus nec iaculis mauris.');
		}else{
			if(is_array($content)){
				$content = $content;
			}else{
				$content = array($content);
			}
		}
		$i = 0;
		while($i<count($this->card_content)){
			$this->card_content .= $content[$i];
			$i++;
		}
		$this->card_content .= '
		</div>
	</div>';

	}

	function cardFooter($data = NULL,$href = NULL){

		$this->card_footer = '
	<footer class="card-footer">';
		if($data==NULL){
			$data = array('Card','Footer');
		}
		if($href==NULL){
			$href = array('#','#');
		}
		if(!is_array($data)){
			$data = array($data);
		}
		if(!is_array($href)){
			$data = array($href);
		}
		if(count($data)!=count($href)){
			echo "You must set same qty of titles and href's for proceed";
			die();
		}
		$i = 0;
		while($i<count($data)){
			$this->card_footer .= '
		<a href="'.$href[$i].'" class="card-footer-item">'.$data[$i].'</a>';
			$i++;
		}
		$this->card_footer .= '
	</footer>';

	}

	function render($output = TRUE,$header = FALSE,$img = FALSE,
		$content = FALSE,$footer = FALSE){

		if(isset($this->card_header)){
			$this->card .= $this->card_header;
		}else{
			if($header==TRUE){
				$this->cardFooter();
			}
		}
		if(isset($this->card_img)){
			$this->card .= $this->card_img;
		}else{
			if($header==TRUE){
				$this->cardImage();
			}
		}
		if(isset($this->card_content)){
			$this->card .= $this->card_content;
		}else{
			if($content==TRUE){
				$this->cardContent();
			}
		}
		if(isset($this->card_footer)){
			$this->card .= $this->card_footer;
		}else{
			if($footer==TRUE){
				$this->cardFooter();
			}else{
				$this->cardFooter('','');
			}
		}

		$this->card .= '
</div>';
		if($output==FALSE){
			return $this->card;
		}else{
			echo $this->card;
		}

	}

}

/**
 * qtzl-lib class message
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class message{

	/**
	 * qtzl-lib class message
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($color = NULL,$size = NULL){

		switch($color){
			case 'primary':
				$this->mode = ' is-primary';
				break;
			case 'link':
				$this->mode = ' is-link';
				break;
			case 'info':
				$this->mode = ' is-info';
				break;
			case 'success':
				$this->mode = ' is-success';
				break;
			case 'warning':
				$this->mode = ' is-warning';
				break;
			case 'danger':
				$this->mode = ' is-danger';
				break;
			case 'black':
				$this->mode = ' is-black';
				break;
			case 'dark':
				$this->mode = ' is-dark';
				break;
			case 'light':
				$this->mode = ' is-light';
				break;
			default:
				$this->mode = '';
				break;
		}

		switch($size){
			case 'small':
				$this->size = $this->mode.' is-small';
				break;
			case 'medium':
				$this->size = $this->mode.' is-medium';
				break;
			case 'large':
				$this->size = $this->mode.' is-large';
				break;
			default:
				$this->size = NULL;
				break;
		}
		$this->message = '
<article class="message'.$this->mode.''.$this->size.'">';

	}

	function messageHeader($title = NULL,$button = TRUE){

		if($title==NULL){
			$this->title = 'Message Header';
		}else{
			$this->title = $title;
		}
		if($button==FALSE){
			$this->button = NULL;
		}else{
			$this->button = '<button class="delete'.$this->size.
				'" aria-label="delete"></button>';
		}
		$this->header = '
	<div class="message-header">
		<p>'.$this->title.'</p>
		'.$this->button.'
	</div>';

	}

	function messageBody($content = NULL){

		if($content==NULL){
			$this->content = '<strong>Message body</strong> Lorem ipsum dolor';
			;
		}else{
			if(!is_array($content)){
				$this->content = array($content);
			}
		}
		$this->body = '
	<div class="Message-body">';
		$i = 0;
		while($i<count($this->content)){
			$this->body .= $this->content[$i];
			$i++;
		}
		$this->body .= '
	</div>';

	}

	function render($header = FALSE,$content = FALSE,$output = TRUE){

		if(!isset($this->header)){
			if($header==FALSE){
				$this->header = NULL;
			}else{
				$this->messageHeader();
			}
		}
		if(!isset($this->content)){
			$this->messageBody();
		}

		$this->message .= $this->header;
		$this->message .= $this->content;
		$this->message .= '
</article>';

		if($output==TRUE){
			echo $this->message;
		}else{
			return $this->message;
		}

	}

}

/**
 * qtzl-lib class image
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class image{

	/**
	 * qtzl-lib class engine
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($size = NULL){

		$this->sizes = array('16x16'=>'16x16','24x24'=>'24x24','32x32'=>'32x32',
				'48x48'=>'48x48','64x64'=>'64x64','96x96'=>'96x96',
				'128x128'=>'128x128','480x480'=>'square','480x480'=>'1by1',
				'600x480'=>'5by4','640x480'=>'4by3','480x320'=>'3by2',
				'800x480'=>'5by3','640x360'=>'16by9','640x320'=>'2by1',
				'720x240'=>'is-3by1','480x600'=>'4by5','480x640'=>'3by4',
				'320x480'=>'2by3','480x800'=>'3by5','360x460'=>'9by16',
				'320x640'=>'1by2','240x720'=>'1by3',);

		$this->placeholder = array_flip($this->sizes);
		if($size==NULL){
			$this->size = 'image is-128x128';
			$this->set = '128x128';
		}else{
			if(in_array($size,$this->sizes)){
				$this->size = 'image is-'.$size;
				$this->set = $this->placeholder[$size];
			}else{
				$this->size = 'image is-128x128';
				$this->set = '128x128';
			}
		}
		$this->figure = '<figure class="'.$this->size.'">';

	}

	function addImg($src = NULL,$round = FALSE){

		if($round!=FALSE){
			$this->round = ' class="is-rounded" ';
		}else{
			$this->round = '';
		}
		if($src==NULL){
			$this->src = 'https://bulma.io/images/placeholders/'.$this->set.
				'.png';
		}else{
			$this->src = $src;
		}
		$this->image = '<img '.$this->round.'src="'.$this->src.'">';
		return $this->image;

	}

	function render($output = TRUE){

		if(!isset($this->image)){
			$this->addImg();
		}
		$this->img_array[] = $this->figure;
		$this->img_array[] = $this->image;
		$this->img_array[] = '</figure>';
		$this->img = '
'.$this->figure.'	
	'.$this->image;
		$this->img .= '
</figure>';
		if($output==TRUE){
			echo ($this->img);
		}else{
			return $this->img;
		}

	}

}

/**
 * qtzl-lib class modal
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class modal{

	var $modal = NULL;

	function __construct($id = NULL){

		if($id==NULL){
			$this->id = "modal";
		}else{
			$this->id = $id;
		}
		$this->modal = '
<div id="'.$this->id.'" class ="modal">
	<div class="modal-background"></div>';

	}

	function addContent($content = NULL){

		$this->modalcontent = NULL;

		if($content==NULL){
			$this->content = array(
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
<strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec 
nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, 
et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, 
in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna 
tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem 
eget, facilisis sodales sem. ');
		}else{
			if(!is_array($content)){
				$this->content = array($content);
			}else{
				$this->content = $content;
			}
		}
		$this->modalcontent .= '
	<div class="modal-content">
		<div class="container"> 
			<div class="column"> 
				<div class="box"> 
					<p>';
		$i = 0;
		while($i<count($this->content)){
			$this->modalcontent .= $this->content[$i];
			$i++;
		}
		$this->modalcontent .= '
					</p>
				</div>
			</div>
		</div>
	</div>';
		return $this->modalcontent;

	}

	function addImage($imgsrc = NULL,$size = NULL){

		if($imgsrc==NULL){
			$this->img = 'https://bulma.io/images/placeholders/1280x960.png';
		}else{
			if(file_exists($imgsrc)){
				$this->img = $imgsrc;
			}else{
				$this->img = $imgsrc;
			}
		}
		$this->sizes = array('16x16'=>'16x16','24x24'=>'24x24','32x32'=>'32x32',
				'48x48'=>'48x48','64x64'=>'64x64','96x96'=>'96x96',
				'128x128'=>'128x128','480x480'=>'square','480x480'=>'1by1',
				'600x480'=>'5by4','640x480'=>'4by3','480x320'=>'3by2',
				'800x480'=>'5by3','640x360'=>'16by9','640x320'=>'2by1',
				'720x240'=>'is-3by1','480x600'=>'4by5','480x640'=>'3by4',
				'320x480'=>'2by3','480x800'=>'3by5','360x460'=>'9by16',
				'320x640'=>'1by2','240x720'=>'1by3',);

		$this->placeholder = array_flip($this->sizes);
		if($size==NULL){
			$this->size = 'image is-4by3';
			$this->set = '4by3';
		}else{
			if(in_array($size,$this->sizes)){
				echo "true";
				$this->size = 'image is-'.$size;
				$this->set = $this->placeholder[$size];
			}else{
				echo "false";
				$this->size = 'image is-4by3';
				$this->set = '4by3';
			}
		}

		$this->modalimg = '
	<div class="modal-content">
		<p class="image '.$this->size.'">
			<img src="'.$this->img.
			'" alt="">
		</p>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>';
		return $this->modalimg;

	}

	function addCard($title = NULL,$content = NULL,$button1 = NULL,
		$button2 = NULL){

		$this->modalcard = NULL;

		if($title==NULL){
			$this->title = 'Title';
		}else{
			$this->title = $title;
		}
		if($content==NULL){
			$this->content = array(
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
<strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec
nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam,
et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>,
in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna
tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem
eget, facilisis sodales sem. ');
		}else{
			if(!is_array($content)){
				$this->content = array($content);
			}else{
				$this->content = $content;
			}
		}
		if($button1==NULL){
			$this->button1 = 'Accept';
		}else{
			$this->button1 = $button1;
		}
		if($button1==NULL){
			$this->button2 = 'Cancel';
		}else{
			$this->button2 = $button2;
		}
		$this->modalcard .= '
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">'.$this->title.
			'</p>
		<button class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">';
		$i = 0;
		while($i<count($this->content)){
			$this->modalcard .= $this->content[$i];
			$i++;
		}
		$this->modalcard .= '</section>
		<footer class="modal-card-foot">
			<button class="button is-info">'.$this->button1.
			'</button>
			<button class="button">'.$this->button2.'</button>
		</footer>
	</div>';

	}

	function addButton($id = NULL,$title = NULL,$color = NULL,$size = NULL){

		switch($color){
			case 'primary':
				$this->mode = ' is-primary';
				break;
			case 'link':
				$this->mode = ' is-link';
				break;
			case 'info':
				$this->mode = ' is-info';
				break;
			case 'success':
				$this->mode = ' is-success';
				break;
			case 'warning':
				$this->mode = ' is-warning';
				break;
			case 'danger':
				$this->mode = ' is-danger';
				break;
			case 'black':
				$this->mode = ' is-black';
				break;
			case 'dark':
				$this->mode = ' is-dark';
				break;
			case 'light':
				$this->mode = ' is-light';
				break;
			default:
				$this->mode = ' is-info';
				break;
		}

		switch($size){
			case 'small':
				$this->size = $this->mode.' is-small';
				break;
			case 'medium':
				$this->size = $this->mode.' is-medium';
				break;
			case 'large':
				$this->size = $this->mode.' is-large';
				break;
			default:
				$this->size = NULL;
				break;
		}

		if($id==NULL){
			$this->id = $this->id;
		}else{
			$this->id = $id;
		}
		if($title==NULL){
			$this->title = 'Modal Button';
		}else{
			$this->title = $title;
		}

		$this->button = '
<button id="'.$this->id.'-button" class="button '.$this->mode.$this->size.
			' modal-button" data-target="'.$this->id.'" aria-haspopup="true">
	'.$this->title.'
</button>';

	}

	function renderModal($type = NULL,$output = TRUE){

		switch($type){
			case 'content':
				if(!isset($this->modalcontent)){
					$this->addContent();
					$this->modal .= $this->modalcontent;
				}else{
					$this->modal .= $this->modalcontent;
				}
				break;
			case 'image':
				if(!isset($this->modalimg)){
					$this->addImage();
					$this->modal .= $this->modalimg;
				}else{
					$this->modal .= $this->modalimg;
				}
				break;
			case 'card':
				if(!isset($this->modalcard)){
					$this->addCard();
					$this->modal .= $this->modalcard;
				}else{
					$this->modal .= $this->modalcard;
				}
				break;
			default:
				if(!isset($this->modalcontent)){
					$this->addContent();
					$this->modal .= $this->modalcontent;
				}else{
					$this->modal .= $this->modalcontent;
				}
				break;
		}

		$this->modal .= '
</div>';
		// @FIXME
// $this->modal .= '
// <script>
// document.querySelector(\'#'.$this->id.
// '-button\').addEventListener(\'click\', function(e) {
// var modalTwo = Bulma(\'#'.$this->id.
// '\').modal();
// modalTwo.open();
// });
// </script>';

		$this->modal .= '
<script>
document.addEventListener(\'DOMContentLoaded\', function () {

    // Modals

    var rootEl = document.documentElement;
    var allModals = getAll(\'.modal\');
    var modalButtons = getAll(\'.modal-button\');
    var modalCloses = getAll(\'.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button\');

    if (modalButtons.length > 0) {
        modalButtons.forEach(function (el) {
            el.addEventListener(\'click\', function () {
                var target = document.getElementById(el.dataset.target);
                rootEl.classList.add(\'is-clipped\');
                target.classList.add(\'is-active\');
            });
        });
    }

    if (modalCloses.length > 0) {
        modalCloses.forEach(function (el) {
            el.addEventListener(\'click\', function () {
                closeModals();
            });
        });
    }

    document.addEventListener(\'keydown\', function (event) {
        var e = event || window.event;
        if (e.keyCode === 27) {
            closeModals();
        }
    });

    function closeModals() {
        rootEl.classList.remove(\'is-clipped\');
        allModals.forEach(function (el) {
            el.classList.remove(\'is-active\');
        });
    }

    // Functions

    function getAll(selector) {
        return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
    }
});
</script>';
		if($output==TRUE){
			echo $this->modal;
		}else{
			return $this->modal;
		}

	}

	function renderButton($title = NULL,$output = TRUE){

		if($output==TRUE){
			if(!isset($this->button)){
				$this->addButton();
				echo $this->button;
			}else{
				echo $this->button;
			}
		}else{
			if(!isset($this->button)){
				$this->addButton();
			}else{
				return $this->button;
			}
		}

	}

}

class tabs{

	var $tab;

	function __construct(){

		$this->tab = '
<div class="tabs-wrapper">
	<div class="tabs">';

	}

}