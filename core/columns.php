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
class columns{

	// TODO Finish this class
	private $init = '';

	private $body = '';

	private $end = '';

	function __construct(){

		$this->init = '
<div class="columns">';

		$this->end = '
</div>';

	}

	function addColumn($item = NULL,$size = NULL){

		if($item!=NULL){
			if(!is_array($item)){
				$item = array($item);
			}

			if($size!=NULL){
				$size = ' is-'.$size;
			}

			for($i = 0;$i<count($item);$i++){
				$mod = '';
				if($i==0){
					$mod = $size;
				}
				$this->body .= '
  <div class="column'.$mod.'">
    '.$item[$i].'
  </div>';
			}
		}

	}

	function render(){

		$columns = $this->init.$this->body.$this->end;
		return $columns;

	}

}

?>