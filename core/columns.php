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
 * qtzl-lib class columns
 * create dynamic columns
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class columns{

	// TODO Implement the offset propiertys
	private $init = '';

	private $body = '';

	private $end = '';

	/**
	 * qtzl-lib class columns
	 * creates a column or columns and initializes the html code
	 * @example $columns = new columns();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function __construct($responsive = TRUE,$gapless = FALSE,$multiline = FALSE,
		$vcentered = FALSE,$hcentered = FALSE){

		$mods = '';

		if($responsive!=TRUE){
			$mods .= ' is-desktop';
		}else{
			$mods .= ' is-mobile';
		}

		if($gapless!=FALSE){
			$mods .= ' is-gapless';
		}

		if($multiline!=FALSE){
			$mods .= ' is-multiline';
		}

		if($vcentered!=FALSE){
			$mods .= ' is-vcentered';
		}

		if($hcentered!=FALSE){
			$mods .= ' is-centered';
		}

		$this->init = '
<div class="columns'.$mods.'">';

		$this->end = '
</div>';

	}

	/**
	 * qtzl-lib columns addColumns function
	 * adds a single or an array of items into the columns
	 * @param $item string to add a new element into a column
	 * @param $size string set the size modifier to specific column
	 * @param $num int to set the specific column or columns to be modified
	 * @example $columns = new columns(); $columns->addColumn($item);
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function addColumns($item = NULL,$size = NULL,$num = NULL){

		if($item!=NULL){

			// Converts size and num to an array if necessary
			if(!is_array($size)){
				$size = array($size);
			}

			if(!is_array($num)){
				$num = array($num);
			}

			// Checks if both arrays have the same amount of values
			if(count($num)==count($size)){
				// Converts item to an array if necessary
				if(!is_array($item)){
					$item = array($item);
				}
				// Creates the columns for each value in item
				for($i = 0;$i<count($item);$i++){
					$mod = '';
					// Checks if the current column to create is in the array
					if(in_array($i+1,$num)){
						// Brings the position of the given column in the array
						$pos = array_search($i+1,$num);
						// Assigns the size modifier given, based on the
						// position
						$mod .= ' is-'.$size[$pos];
					}
					// Creates the column
					$this->body .= '
  <div class="column'.$mod.'">
    '.$item[$i].'
  </div>';
				}
			}else{
				Echo 'Not the same amount of values in size and num arrays';
			}
		}

	}

	/**
	 * qtzl-lib columns render function
	 * assembles all parts of the columns and returns all the html code
	 * @return string
	 * @example $columns = new columns(); $columns->render();
	 * @version Bekermeye (1.2007)
	 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
	 * @author Javier Garrido <javier-garrido@live.com>
	 * @author Enrique Canto <eacm97@hotmail.com>
	 * @license GNU General Public License Version 3
	 */
	function render(){

		$columns = $this->init.$this->body.$this->end;
		return $columns;

	}

}

?>