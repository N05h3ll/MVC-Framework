<?php
/*
*  Main app class 
* Creates URL and loads controllers 
* URL format    /contoller/method/parameters
* controller eg. post
* method eg. add, edit, delete
* parameters eg. id=1 
*/
class core {

    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $parameters = [];
    // constructor calls geturl method and set controllers, method, parameter
    public function __construct(){
        $url = $this->geturl();
        //checks if controller exists
        if(isset($url[0])){
        if(file_exists('../app/controllers/'.$url[0].'.php')){
            $this->currentController = $url[0];
            unset($url[0]);
        }else{die('ERROR , Controller Doesn\'t Exists .');}
    }
        //require the controller
        require_once('../app/controllers/'.$this->currentController.'.php');
        
        //initialize the controller
        $this->currentController = new $this->currentController;
    
        //checks if method exists
        if(isset($url[1])){ 
        if(method_exists($this->currentController,$url[1])){
            $this->currentMethod = $url[1];
            unset($url[1]);
        }else{die('ERROR , Method Doesn\'t Exists .');}
    }
        //Set parameters if exists
        $this->parameters = $url ? array_values($url) : [];

        //callback method with parameters if exists
        call_user_func_array([$this->currentController,$this->currentMethod],$this->parameters);
    }
    
    //geturl method returns array with url components
    public function geturl(){
        if(isset($_GET['url'])){
            //removes '/' form  the end of the url
            $url = rtrim($_GET['url'],'/');

            //santize the string as url to remove invalid chars
            $url = filter_var($url,FILTER_SANITIZE_URL);

            //split to array of url components
            $url = explode('/',$url);
            return $url;
        }
    }
}