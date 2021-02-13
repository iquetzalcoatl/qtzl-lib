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

/**
 * qtzl-lib class container
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class container{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class container
	 * @param $class string to select the type of container
	 * <li><b>fluid</b></li>
	 * <li><b>widescreen</b></li>
	 * <li><b>fullhd</b></li>
	 * @example $container = new container();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($class = NULL){

		if($class!=NULL){
			$class = ' is-'.$class;
		}

		$this->init = '
<div class="container'.$class.'">
';
		$this->end = '
</div>
';

	}

	/**
	 * qtzl-lib container addItem function
	 * adds a single or an array of items into the container
	 * @param $item string to add a new element to the container
	 * @param $eachOne boolean to format each element given in the array
	 * @example $container = new container(); $container->addItem($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL,$eachOne = FALSE){

		if($item!=NULL){

			if(!is_array($item)){
				$item = array($item);
			}

			if($eachOne==FALSE){

				for($i = 0;$i<count($item);$i++){

					$this->body .= $item[$i];
				}
			}else{
				$this->body = $item;
			}
		}

	}

	/**
	 * qtzl-lib container render function
	 * assembles all parts of the container and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $container = new box(); $container->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		if(is_array($this->body)){
			$container = '';
			for($i = 0;$i<count($this->body);$i++){
				$container .= $this->init.$this->body[$i].$this->end;
			}
		}else{

			$container = $this->init.$this->body.$this->end;
		}

		if($print==TRUE){
			echo $container;
		}else{
			return $container;
		}

	}

}

/**
 * qtzl-lib class level
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class level{

	// TODO add templates to the class
	private $init = '';

	private $body = '';

	private $lvlLeft = '';

	private $lvlRight = '';

	private $end = '';

	/**
	 * qtzl-lib class level
	 * @param $class string to select the type of level
	 * <li><b>mobile</b></li>
	 * @example $container = new container();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($class = NULL){

		if($class!=NULL){
			$class = ' is-'.$class;
		}
		$this->init = '
<nav class="level'.$class.'">
';
		$this->end = '
</nav>
';

	}

	/**
	 * qtzl-lib level addItem function
	 * adds a single or an array of items into the level
	 * @param $item string to add a new element to the level
	 * @param $align string to set the alignment of the new element
	 * <li><b>left</b></li>
	 * <li><b>right</b></li>
	 * @example $level = new level(); $level->addItem($item, $align);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL,$align = NULL){

		if($item!=NULL){
			if(!is_array($item)){

				$item = array($item);
			}

			if($align==NULL){
				for($i = 0;$i<count($item);$i++){

					$this->body .= '
              <div class="level-item has-text-centered">
                '.$item[$i].'
              </div>
            ';
				}
			}else{
				if($align=='right'||$align=='left'){
					$lvlAlign = '';
					for($i = 0;$i<count($item);$i++){

						$lvlAlign .= '
    <div class="level-item">
        '.$item[$i].'
    </div>
';
					}

					if($align=='right'){
						$this->lvlRight .= $lvlAlign;
					}elseif($align=='left'){
						$this->lvlLeft .= $lvlAlign;
					}
				}
			}
		}

	}

	/**
	 * qtzl-lib level render function
	 * assembles all parts of the level and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $level = new level(); $level->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		if($this->lvlLeft!=NULL){
			$lvlAlign = '
 <div class="level-left">
';
			$lvlAlign .= $this->lvlLeft;
			$lvlAlign .= '
 </div>
';
			$this->lvlLeft = $lvlAlign;
		}
		if($this->lvlRight!=NULL){
			$lvlAlign = '
 <div class="level-right">
';
			$lvlAlign .= $this->lvlRight;
			$lvlAlign .= '
 </div>
';
			$this->lvlRight = $lvlAlign;
		}
		$this->body = $this->lvlLeft.$this->body.$this->lvlRight;
		$level = $this->init.$this->body.$this->end;

		if($print==TRUE){
			echo $level;
		}else{
			return $level;
		}

	}

}

/**
 * qtzl-lib class mediaObject
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class mediaObject{

	private $init = '';

	private $mediaLeft = '';

	private $mediaCont = '';

	private $mediaRight = '';

	private $end = '';

	/**
	 * qtzl-lib class mediaObject
	 * @example $mediaObject = new mediaObject();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct(){

		$this->init = '
<article class="media">
';
		$this->end = '
</article>
';

	}

	/**
	 * qtzl-lib mediaObject addItem function
	 * adds a single or an array of items into the mediaObject
	 * @param $item string to add a new element to the mediaObject
	 * @param $align string to set the alignment of the new element
	 * <li><b>left</b></li>
	 * <li><b>right</b></li>
	 * @example $media = new mediaObject(); $mediaObject->addItem($item,
	 * $align);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL,$align = NULL){

		if($item!=NULL){
			if(!is_array($item)){

				$item = array($item);
			}

			if($align==NULL){
				for($i = 0;$i<count($item);$i++){

					$this->mediaCont .= $item[$i];
				}
			}else{
				if($align=='right'||$align=='left'){
					$mediaAlign = '';
					for($i = 0;$i<count($item);$i++){

						$mediaAlign .= $item[$i];
					}

					if($align=='right'){
						$this->mediaRight .= $mediaAlign;
					}elseif($align=='left'){
						$this->mediaLeft .= $mediaAlign;
					}
				}
			}
		}

	}

	/**
	 * qtzl-lib mediaObject render function
	 * assembles all parts of the mediaObject and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $mediaObject = new mediaObject(); $mediaObject->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print){

		if($this->mediaLeft!=NULL){
			$mediaAlign = '
 <div class="media-left">
';
			$mediaAlign .= $this->mediaLeft;
			$mediaAlign .= '
 </div>
';
			$this->mediaLeft = $mediaAlign;
		}
		if($this->mediaRight!=NULL){
			$mediaAlign = '
 <div class="media-right">
';
			$mediaAlign .= $this->mediaRight;
			$mediaAlign .= '
 </div>
';
			$this->mediaRight = $mediaAlign;
		}
		if($this->mediaCont!=NULL){
			$mediaAlign = '
 <div class="media-content">
';
			$mediaAlign .= $this->mediaCont;
			$mediaAlign .= '
 </div>
';
			$this->mediaCont = $mediaAlign;
		}
		$body = $this->mediaLeft.$this->mediaCont.$this->mediaRight;
		$mediaObject = $this->init.$body.$this->end;

		if($print==TRUE){
			echo $mediaObject;
		}else{
			return $mediaObject;
		}

	}

	/**
	 * qtzl-lib mediaObject mediaObjectBox function
	 * creates a customizable mediaObject box template
	 * @param $image string to set image source
	 * @param $title string to set mediaObject title
	 * @param $account string to set mediaObject secondary title
	 * @param $timestap string to set a timestamp
	 * @param $text string to set mediaObject text
	 * @param $icon string to set mediaObject icons from FontAwesome5 library
	 * @example $mediaObj = new mediaObject();
	 * $mediaObj->mediaBox($image,$title,$account, $timestap, $text, $icon);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */

	// This function is a template for a mediaObject
	function mediaObjectBox($image = NULL,$title = NULL,$account = NULL,
		$timestap = NULL,$text = NULL,$icon = NULL){

		$this->mediaCont = '
    <article class="media">';

		if($image!=NULL){
			$this->mediaCont .= '
	<div class="media-left">
		<figure class="image is-64x64">
			<img src="'.$image.'" alt="Image">
		</figure>
	</div>';
		}

		$this->mediaCont .= '
	<div class="media-content">
		<div class="content">
			<p>
				<strong>'.$title.'</strong> <small>'.$account.'</small> <small>'.$timestap.
			'</small>
				<br>
			'.$text.'
			</p>
		</div>
		<nav class="level is-mobile">
		<div class="level-left">';

		if($icon!=NULL){

			if(!is_array($icon)){

				$icon = array($icon);
			}

			for($i = 0;$i<count($icon);$i++){
				$this->mediaCont .= '
			<a class="level-item" aria-label="'.$icon[$i].
					'">
				<span class="icon is-small">
					<i class="fas fa-'.$icon[$i].'" aria-hidden="true"></i>
				</span>
			</a>';
			}
		}

		$this->mediaCont .= '
		</div>
			</nav>
		</div>
    </article>
                ';

	}

}

/**
 * qtzl-lib class hero
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class hero{

	// TODO add navbar features
	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class hero
	 * @param $class string to set the hero color
	 * @param $size string to set the hero size
	 * <li><b>medium</b></li>
	 * <li><b>large</b></li>
	 * <li><b>fullheight</b></li>
	 * @param $gradient string to generate a subtle gradient.
	 * <li><b>bold</b></li>
	 * @example $hero = new hero();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($color = NULL,$size = NULL,$gradient = NULL){

		if($color==NULL){
			$color = ' is-primary';
		}else{
			$color = ' is-'.$color;
		}

		if($size!=NULL){
			$size = ' is-'.$size;
		}

		if($gradient!=NULL){
			$gradient = ' is-'.$gradient;
		}

		$this->init = '
<section class="hero'.$color.$size.$gradient.'">
';
		$this->end = '
</section>
';

	}

	/**
	 * qtzl-lib hero addItem function
	 * @param $title string to add a new element to the hero
	 * @param $subtitle string to add an element below the title
	 * @example $hero = new hero(); $hero->addItem($title,$subtitle);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($title,$subtitle){

		$this->body = '
<div class="hero-body">
  <div class="container">
    <h1 class="title">
			'.$title.'
    </h1>
    <h2 class="subtitle">
			'.$subtitle.'
    </h2>
  </div>
</div>
';

	}

	/**
	 * qtzl-lib hero render function
	 * assembles all parts of the hero and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $hero = new hero(); $hero->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		$hero = $this->init.$this->body.$this->end;

		if($print==TRUE){
			echo $hero;
		}else{
			return $hero;
		}

	}

}

/**
 * qtzl-lib class section
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class section{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class section
	 * @param $class string to select the type of modifier of the section
	 * <li><b>medium</b></li>
	 * <li><b>large</b></li>
	 * @example $section = new section();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($class = NULL){

		if($class!=NULL){
			$class = ' is-'.$class;
		}

		$this->init = '
<section class="section'.$class.'">
';
		$this->end = '
</section>
';

	}

	/**
	 * qtzl-lib section addItem function
	 * adds a single or an array of items into the section
	 * @param $item string to add a new element to the section
	 * @example $section = new section(); $section->addItem($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL){

		if($item!=NULL){
			if(!is_array($item)){
				$item = array($item);
			}

			for($i = 0;$i<count($item);$i++){
				$this->body .= $item[$i];
			}
		}

	}

	/**
	 * qtzl-lib section render function
	 * assembles all parts of the section and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $section = new section(); $section->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		$section = $this->init.$this->body.$this->end;

		if($print==TRUE){
			echo $section;
		}else{
			return $section;
		}

	}

}

/**
 * qtzl-lib class footer
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class footer{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class footer
	 * @example $footer = new footer();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct(){

		$this->init = '
<footer class="footer">
';
		$this->end = '
</footer>
';

	}

	/**
	 * qtzl-lib footer addItem function
	 * adds a single or an array of items into the footer
	 * @param $item string to add a new element to the footer
	 * @example $footer = new footer(); $footer->addItem($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL){

		if($item!=NULL){
			if(!is_array($item)){
				$item = array($item);
			}

			for($i = 0;$i<count($item);$i++){
				$this->body .= $item[$i];
			}
		}

	}

	/**
	 * qtzl-lib footer render function
	 * assembles all parts of the footer and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $footer = new footer(); $footer->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		$footer = $this->init.$this->body.$this->end;

		if($print==TRUE){
			echo $footer;
		}else{
			return $footer;
		}

	}

}

/**
 * qtzl-lib class tile
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class tile{

	// TODO Improve it
	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class tile
	 * @param $contextual string to add a hierarchy to the tile
	 * <li><b>ancestor</b></li>
	 * <li><b>parent</b></li>
	 * <li><b>child</b></li>
	 * @param $class string to set a class for the tile
	 * @param $directional string to set the orientation of the tile
	 * <li><b>vertical</b></li>
	 * @param $horizontal string to set the size
	 * <li><b>Any number between 1 and 12</b></li>
	 * @param $color string to set a color for the tile
	 * @example $tile = new tile();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($contextual = NULL,$class = NULL,$directional = NULL,
		$horizontal = NULL,$color = NULL){

		if($contextual!=NULL){
			$contextual = ' is-'.$contextual;
		}

		if($class!=NULL){
			$class = ' '.$class;
		}

		if($directional!=NULL){
			$directional = ' is-'.$directional;
		}

		if($horizontal!=NULL){
			$horizontal = ' is-'.$horizontal;
		}

		if($color!=NULL){
			$color = ' is-'.$color;
		}

		$mods = $contextual.$class.$directional.$horizontal.$color;
		$this->init = '
<div class="tile'.$mods.'">
';
		$this->end = '
</div>
';

	}

	/**
	 * qtzl-lib tile addItem function
	 * adds a single or an array of items into the tile
	 * @param $item string to add a new element to the tile
	 * @example $tile = new tile(); $tile->addItem($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addItem($item = NULL){

		if($item!=NULL){
			if(!is_array($item)){
				$item = array($item);
			}

			for($i = 0;$i<count($item);$i++){
				$this->body .= $item[$i];
			}
		}

	}

	/**
	 * qtzl-lib tile render function
	 * assembles all parts of the tile and returns all the html code
	 * @param $print boolean to print the html code
	 * @return string
	 * @example $tile = new tile(); $tile->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render($print = TRUE){

		$tile = $this->init.$this->body.$this->end;

		if($print==TRUE){
			echo $tile;
		}else{
			return $tile;
		}

	}

}
?>