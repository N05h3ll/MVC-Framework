<?php

class pages extends controller {
    public function     __construct(){

    }
    public function index(){
        $data = ['title'=>'Welcome'];
        $this->view('index',$data);
    }
    public function about(){
        
        
    }
}