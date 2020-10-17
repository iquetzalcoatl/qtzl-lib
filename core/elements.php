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
	 * @example $block = new block(); $block->addItem($item);
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

		$this->body = '
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

/**
 * qtzl-lib class button
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class button{

	// TODO add group buttons features
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

		// Builds the init with all the parameters given
		$initAttr = $initType.$initName.$initValue.$initClass.$initDisabled;
		$this->init = '<'.$tag.$initAttr.'>';

		// Builds the body if the current tag is not input
		if($tag!='input'){
			$this->body = '<span>'.$text.'</span>';
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
	function addIcon($icon = NULL,$align = NULL){

		// Sets the default alignment and type
		if($align==NULL){
			$align = 'left';
		}

		// Adds the icon or icons to the button based on the align given
		if($icon!=NULL){

			if(!is_array($icon)){
				$icon = array($icon);
			}

			$concat = '';

			for($i = 0;$i<count($icon);$i++){
				$concat .= $icon[$i];
			}

			if($align=='right'){

				$this->body = $this->body.$concat;
			}elseif($align=='left'){

				$this->body = $concat.$this->body;
			}else{
				echo 'Set a valid aligment (left or right)';
			}
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

/**
 * qtzl-lib class content
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class content{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class content
	 * creates a content and initializes the html code
	 * @example $content = new content();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($size = NULL){

		if($size!=NULL){
			$size = ' is-'.$size;
		}
		$this->init = '
<div class="content'.$size.'">';
		$this->end = '
</div>';

	}

	/**
	 * qtzl-lib content addItem function
	 * adds a single or an array of items into the content
	 * @param $item string to add a new element to the content
	 * @param $eachOne boolean to format each element given in the array
	 * @example $content = new content(); $content->addItem($item);
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
	 * qtzl-lib content render function
	 * assembles all parts of the content and returns all the html code
	 * @return string
	 * @example $content = new content(); $content->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		if(is_array($this->body)){
			$content = '';
			for($i = 0;$i<count($this->body);$i++){
				$content .= $this->init.$this->body[$i].$this->end;
			}

			return $content;
		}else{

			$content = $this->init.$this->body.$this->end;
			return $content;
		}

	}

}

/**
 * qtzl-lib class delete
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class delete{

	private $init = '';

	private $end = '';

	/**
	 * qtzl-lib class delete
	 * creates a delete and initializes the html code
	 * @param $size string to set the delete's size
	 * <li>small</li>
	 * <li>medium</li>
	 * <li>large</li>
	 * @param $tag string to set the html tag for the delete
	 * <li>a</li>
	 * <li>button</li>
	 * @example $delete = new delete();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($size = NULL,$tag = NULL){

		if($tag==NULL){
			$tag = 'a';
		}
		if($size!=NULL){
			$size = ' is-'.$size;
		}
		$this->init = '<'.$tag.' class="delete'.$size.'"></a>';

		$this->end = '</'.$tag.'>';

	}

	/**
	 * qtzl-lib delete render function
	 * assembles all parts of the delete and returns all the html code
	 * @return string
	 * @example $delete = new delete(); $delete->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		$delete = $this->init.$this->end;
		return $delete;

	}

}

/**
 * qtzl-lib class icon
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class icon{

	private $html = '';

	/**
	 * qtzl-lib class icon
	 * creates a icon and initializes the html code
	 * @param $iconName string to select an icon from Font Awesome 5 Free
	 * Library
	 * @param $color string to set the icon's color
	 * @param $iconClass string to set the icon's container size
	 * <li>small</li>
	 * <li>medium</li>
	 * <li>large</li>
	 * @param $faClass string to set the icon size from Font Awesome 5 Library
	 * sizes
	 * <li>lg -> compatible with icon classes: default, medium and large</li>
	 * <li>2x -> compatible with icon classes: medium and large</li>
	 * <li>3x -> compatible with icon classes: large</li>
	 * @param $faVar string to set a Font Awesome 5 variant to the icon
	 * <li>pulse -> for an animated spinning icon </li>
	 * <li>fw -> for a fixed width icon</li>
	 * <li>border -> for a bordered icon</li>
	 * @example $icon = new icon();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($iconName = NULL,$color = NULL,$iconClass = NULL,
		$faClass = NULL,$faVar = NULL){

		// TODO Add stacked feature

		// Creates the color, iconClass, faVar and faClass if it's given
		if($color!=NULL){
			$color = ' has-text-'.$color;
		}

		if($iconClass!=NULL){
			$iconClass = ' is-'.$iconClass;
		}

		if($faVar!=NULL){
			$faVar = ' fa-'.$faVar;
		}

		if($faClass!=NULL){
			$faClass = ' fa-'.$faClass;
		}

		// Builds the html code for each part
		$this->html = '
           <span class="icon'.$iconClass.$color.'">
           	<i class="fa'.$faVar.$faClass.' fa-'.$iconName.'"></i>
           </span>';

	}

	/**
	 * qtzl-lib icon render function
	 * assembles all parts of the icon and returns all the html code
	 * @return string
	 * @example $icon = new icon(); $icon->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		return $this->html;

	}

}

/**
 * qtzl-lib class notification
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class notification{

	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class notification
	 * creates a notification and initializes the html code
	 * @param $color string to set the notification's color
	 * @param $isLight boolean to set the light colored $color given
	 * @param $isDelete boolean to add a delete button in the notification
	 * @example $notification = new notification();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($color = NULL,$isLight = FALSE,$isDelete = FALSE){

		if($color!=NULL){
			$color = ' is-'.$color;
		}

		$lightColored = '';

		if($isLight!=FALSE){
			$lightColored = ' is-light';
		}

		$this->init = '
<div class="notification'.$color.$lightColored.'">';

		if($isDelete==TRUE){
			$this->body = '
<button class="delete"></button>';
		}

		$this->end = '
</div>';

	}

	/**
	 * qtzl-lib notification addItem function
	 * adds a single or an array of items into the notification
	 * @param $item string to add a new element to the notification
	 * @param $eachOne boolean to format each element given in the array
	 * @example $n = new notification(); $notification->addItem($item);
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

					$this->body .= '
	'.$item[$i];
				}
			}else{
				$this->body = $item;
			}
		}

	}

	/**
	 * qtzl-lib notification render function
	 * assembles all parts of the notification and returns all the html code
	 * @return string
	 * @example $notification = new notification(); $notification->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		if(is_array($this->body)){
			$notification = '';
			for($i = 0;$i<count($this->body);$i++){
				$notification .= $this->init.'
	'.$this->body[$i].$this->end;
			}

			return $notification;
		}else{

			$notification = $this->init.$this->body.$this->end;
			return $notification;
		}

	}

}

/**
 * qtzl-lib class progressBar
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class progressBar{

	private $html = '';

	/**
	 * qtzl-lib class progressBar
	 * creates a progressBar and initializes the html code
	 * @param $value string to set the progress of the bar
	 * @param $max string to set the maximun amount of the bar
	 * @param $color string to set the bar's color
	 * @param $size string to set the bar's size
	 * <li>small</li>
	 * <li>medium</li>
	 * <li>large</li>
	 * @example $notification = new notification();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($value = NULL,$max = NULL,$color = NULL,$size = NULL){

		// Sets the size and color
		if($size!=NULL){
			$size = ' is-'.$size;
		}

		if($color!=NULL){
			$color = ' is-'.$color;
		}

		// Creates value and max propierties if they're given
		if($value!=NULL){
			$value = ' value="'.$value.'"';
		}

		if($max!=NULL){
			$max = ' max="'.$max.'"';
		}

		$mods = $size.$color;
		$props = $value.$max;

		// Creates the html with the parameters given
		$this->html = '
<progress class="progress'.$mods.'"'.$props.'></progress>';

	}

	/**
	 * qtzl-lib progressBar render function
	 * assembles all parts of the progressBar and returns all the html code
	 * @return string
	 * @example $progressBar = new progressBar(); $progressBar->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		return $this->html;

	}

}

/**
 * qtzl-lib class tag
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class tag{

	// TODO Finish this class
}

/**
 * qtzl-lib class title
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class title{

	private $html = '';

	/**
	 * qtzl-lib class title
	 * creates a title or a subtitle and initializes the html code
	 * @param $text string to set the shown text
	 * @param $type string to set the type of title
	 * <li>title</li>
	 * <li>subtitle</li>
	 * @param $size string to set the size of the title or subtitle
	 * <li>1</li>
	 * <li>2</li>
	 * <li>3</li>
	 * <li>4</li>
	 * <li>5</li>
	 * <li>6</li>
	 * @param $isSpaced boolean to set if the title is spaced or not
	 * @example $title = new title();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($text = NULL,$type = NULL,$size = NULL,
		$isSpaced = FALSE){

		// Sets the default type and text
		if($type==NULL){
			$type = 'title';
		}

		if($text==NULL){
			$text = 'I\'m default '.$type.'';
		}

		// Sets the size if it's given
		if($size!=NULL){
			$size = ' is-'.$size;
		}

		// Checks whether it should be spaced or not
		$spaced = '';
		if($isSpaced==TRUE){
			$spaced = ' is-spaced';
		}

		// Builds the html code
		$this->html = '
<p class="'.$type.''.$size.''.$spaced.'">'.$text.'</p>';

	}

	/**
	 * qtzl-lib title render function
	 * assembles all parts of the title and returns all the html code
	 * @return string
	 * @example $title = new title(); $title->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		return $this->html;

	}

}
?>