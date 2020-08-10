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

/**
 * qtzl-lib class button
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class button{//FIXME add documentation and finish the class
    private $text = '';
    private $class = '';
    private $html = '';
    
    function __construct($text=NULL, $mods=NULL){//FIXME add disabled property
        $this->text = $text;
        $this->class = $mods;
        $this->html = '<button class="button';
        
        if ($this->class != NULL) {
            if (!is_array($this->class)) {
                $this->class = array($this->class);
            }
            
            for ($i = 0; $i < count($this->class); $i++) {
                $concat = ' is-'.$this->class[$i];
                $this->html .= $concat;
            }
            
        }
        
        $this->html .= '">';
    }
    
    function addIcon($icon, $size=NULL) {
        //FIXME add feature to add icons to the right of the text
        $this->html .= '
        <span class="icon '.$size.'">
        <i class="fas fa-'.$icon.'"></i>
        </span>
        ';
    }
    
    function render() {
        $concat = '<span>'.$this->text.'</span>';
        $this->html .= $concat.'</button>';
        return $this->html;
    }
}


?>