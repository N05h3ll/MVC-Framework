<?php

require_once'config/config.php';

//This function auto loads he libraries 
spl_autoload_register(function($class){
    require_once'lib/'.$class.'.php';
});



?>