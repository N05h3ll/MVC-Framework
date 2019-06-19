<?php
/* Main Controller 
*  
*  Loads model and views if exists
*  
*/
class controller {
    //Loading model passed in parameter
    public function model($model){
        if(file_exists('../app/models/'.$model.'.php')){
            require_once '../app/models/'.$model.'.php';
            return new $model;
        }else{
            die('ERROR , Model Doesn\'t Exists .');
        }
    }
    //Loading view passed in parameter
    public function view($view,$data=[]){
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        }else{
            die('ERROR , View Doesn\'t Exists .');
        }
    }
}