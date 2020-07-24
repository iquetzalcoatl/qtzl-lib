<?php 

class engine{
    var $title;
    var $dir;
    var $html;
    private $css;
    private $map;
    
    function __construct(){
        
    }
    
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
            $this->js='js/fontawesome.js';
        }
        $this->html ='
<!DOCTYPE html>
<html>
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
<script src=""></script>
</body>
</html>
';
        return $this->html;
    }
    function render() {
        echo $this->html;
    }
}

class navbar{
    function __construct(){
        
    }
}

class form{
    function __construct(){
        
    }
}


