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
    private $isRender = FALSE;
    
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
    function __construct($class=NULL) {
        if ($class!=NULL) {
            $class = 'is-'.$class;
        }
        
        $this->init = '
<div class="container '.$class.'">
        ';
        $this->end = '
</div>
        ';
    }
    
    /**
     * qtzl-lib container addItem function
     * @desc adds a single or an array of items into the container
     * @param $item string to add a new element to the container
     * @example $container = new container(); $container->addItem($item);
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
     * qtzl-lib container render function
     * @desc assembles all parts of the container and returns all the html code
     * @return string
     * @example $container = new box(); $container->render();
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
}

/**
 * qtzl-lib class level
 * @version Bekermeye (1.2007)
 * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
 * @author Javier Garrido <javier-garrido@live.com>
 * @author Enrique Canto <eacm97@hotmail.com>
 * @license GNU General Public License Version 3
 */
class level{//FIXME add templates to the class
    private $init = '';
    private $body = '';
    private $lvlLeft = '';
    private $lvlRight = '';
    private $end = '';
    private $isRender = FALSE;
    
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
    function __construct($class=NULL) {
        if ($class!=NULL) {
            $class = 'is-'.$class;
        }
        $this->init = '
<nav class="level">
';
        $this->end = '
</nav>
';
    }
    /**
    * qtzl-lib level addItem function
    * @desc adds a single or an array of items into the level
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
    function addItem($item=NULL, $align=NULL){
        if ($this->isRender==FALSE) {

            if ($item!=NULL) {
                if (!is_array($item)) {
                    
                    $item = array($item);
                }
                
                if ($align==NULL) {
                    for ($i = 0; $i < count($item); $i++) {
                        
                        $this->body .= '
              <div class="level-item has-text-centered">
                '.$item[$i].'
              </div>
            ';
                    }
                } else {
                    if ($align=='right' || $align=='left') {
                        $lvlAlign = '';
                        for ($i = 0; $i < count($item); $i++) {
                            
                            $lvlAlign .= '
    <div class="level-item">
        '.$item[$i].'
    </div>
';
                        }
                        
                        if ($align=='right') {
                            $this->lvlRight .= $lvlAlign;
                        } elseif ($align=='left') {
                            $this->lvlLeft .= $lvlAlign;
                        }
                    }
                    
                }
                
            }
        }
    }

    /**
     * qtzl-lib level render function
     * @desc assembles all parts of the level and returns all the html code
     * @return string
     * @example $level = new level(); $level->render();
     * @version Bekermeye (1.2007)
     * @copyright (C) 2007 Free Software Foundation <http:fsf.org/>
     * @author Javier Garrido <javier-garrido@live.com>
     * @author Enrique Canto <eacm97@hotmail.com>
     * @license GNU General Public License Version 3
     */
    function render(){
        if ($this->isRender==FALSE) {
            if ($this->lvlLeft!=NULL) {
                $lvlAlign = '
 <div class="level-left">
';
                $lvlAlign .= $this->lvlLeft;
                $lvlAlign .= '
 </div>
';
                $this->lvlLeft = $lvlAlign;
            }
            if ($this->lvlRight!=NULL) {
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
            $this->isRender = TRUE;
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
    
}

?>