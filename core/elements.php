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
 * qtzl-lib class block
 * is a simple spacer tool
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class block{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class block
	 * creates a block and initializes the html code
	 * @example $block = new block();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct(){

		$this->init = '
<div class="block">';
		$this->end = '
</div>';

	}

	/**
	 * qtzl-lib block addItem function
	 * adds a single or an array of items into the block
	 * @param $item string to add a new element to the block
	 * @param $eachOne boolean to format each element given in the array
	 * @example $block = new block(); $block->addItem($block);
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
	 * qtzl-lib block render function
	 * assembles all parts of the block and returns all the html code
	 * @return string
	 * @example $block = new block(); $block->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		if(is_array($this->body)){
			$block = '';
			for($i = 0;$i<count($this->body);$i++){
				$block .= $this->init.$this->body[$i].$this->end;
			}

			return $block;
		}else{

			$block = $this->init.$this->body.$this->end;
			return $block;
		}

	}

}

/**
 * qtzl-lib class box
 * is simply a container with a shadow, a border,
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
<div class="box">';
		$this->end = '
</div>';

	}

	/**
	 * qtzl-lib box addItem function
	 * adds a single or an array of items into the box
	 * @param $item string to add a new element to the box
	 * @param $eachOne boolean to format each element given in the array
	 * @example $box = new box(); $box->addItem($item);
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

		if(is_array($this->body)){
			$box = '';
			for($i = 0;$i<count($this->body);$i++){
				$box .= $this->init.$this->body[$i].$this->end;
			}

			return $box;
		}else{

			$box = $this->init.$this->body.$this->end;
			return $box;
		}

	}

	/**
	 * qtzl-lib box mediaBox function
	 * creates a customizable media box template
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
    <article class="media">';

			if($image!=NULL){
				$this->body .= '
	<div class="media-left">
		<figure class="image is-64x64">
			<img src="'.$image.'" alt="Image">
		</figure>
	</div>';
			}

			$this->body .= '
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
					$this->body .= '
			<a class="level-item" aria-label="'.$icon[$i].
						'">
				<span class="icon is-small">
					<i class="fas fa-'.$icon[$i].'" aria-hidden="true"></i>
				</span>
			</a>';
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
 * qtzl-lib class button
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class button{

	// TODO finish this class
	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class button
	 * creates a button and initializes the html code
	 * @param $text string to set the text shown in the button
	 * @param $mods string to set all the modifiers of the button
	 * @param $tag string to set the type of html tag for the button
	 * <li>a</li>
	 * <li>button</li>
	 * <li>input</li>
	 * @param $type string to set the type of html button
	 * <li>button</li>
	 * <li>submit</li>
	 * <li>reset</li>
	 * @param $value string to set the value and name of the button
	 * @param $disabled boolean to set whether the button is disabled or not
	 * @example $button = new button();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($text = NULL,$mods = NULL,$tag = NULL,$type = NULL,
		$value = NULL,$disabled = FALSE){

		// Checks if tag, value and type are nulls to set the defaults
		if($tag==NULL){
			$tag = 'button';
		}

		if($type==NULL){
			$type = 'button';
		}

		if($value==NULL){
			$value = $text;
		}

		// Creates the parts of the init
		$initClass = ' class="button';
		$initType = ' type="'.$type.'"';
		$initValue = ' value="'.$value.'"';
		$initName = ' name="'.$value.'"';
		$initDisabled = '';
		if($disabled==TRUE){
			$initDisabled = ' disabled';
		}

		// Concatenates all the modifiers given
		if($mods!=NULL){
			if(!is_array($mods)){
				$mods = array($mods);
			}
			for($i = 0;$i<count($mods);$i++){
				$initClass .= ' is-'.$mods[$i];
			}
		}
		$initClass .= '"';

		// Builds the init based on the given tag
		$initAttr = $initType.$initName.$initValue.$initClass.$initDisabled;
		$this->init = '<'.$tag.$initAttr.'>';

		// Builds the body if the current tag is not input
		if($tag!='input'){
			$this->body = $text;
		}

		// Builds the end tag if the given one is not input
		if($tag!='input'){
			$this->end = '</'.$tag.'>';
		}

	}

	/**
	 * qtzl-lib button addIcon function
	 * adds a single or an array of icons from Font Awesome 5 Library
	 * (this function is only valid for the "button" and "a" html tags)
	 * @param $icon string to add a new icon to the button
	 * @param $type string to the type of icon (Font Awesome 5 Library free
	 * types)
	 * <li>fas -> for common icons</li>
	 * <li>fab -> for brand icons</li>
	 * @param $size string to set a size for the icon in the button
	 * <li>small</li>
	 * <li>medium</li>
	 * @param $align string to set an alignment for the icon in the button
	 * <li>left</li>
	 * <li>right</li>
	 * @example $button = new button(); $box->addIcon($icon);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addIcon($icon = NULL,$type = NULL,$size = NULL,$align = NULL){

		// Sets the default alignment and type
		if($align==NULL){
			$align = 'left';
		}

		if($type==NULL){
			$type = 'fas';
		}

		// Creates the size class if it's given
		if($size!=NULL){
			$size = ' is-'.$size;
		}

		// Builds the html code for each part
		$htmlIcon = '
           <span class="icon'.$size.'">
           <i class="'.$type.' fa-'.$icon.'"></i>
           </span>
           ';

		$htmlText = '<span>'.$this->body.'</span>';

		// Assembles both parts depending of the alignment of the icon given
		if($align=='left'){
			$this->body = $htmlIcon.$htmlText;
		}elseif($align=='right'){
			$this->body = $htmlText.$htmlIcon;
		}else{
			echo 'Try a valid alignment for the icon (left or rigth)';
		}

	}

	/**
	 * qtzl-lib button render function
	 * assembles all parts of the button and returns all the html code
	 * @return string
	 * @example $button = new button(); $box->button();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		$button = $this->init.$this->body.$this->end;
		return $button;

	}

}

?>