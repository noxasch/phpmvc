<?php
/** 
 * will include or require all the libraries
*/

// load config
require_once 'config/config.php';


// load libraries
/*
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
*/

// Autoload core libraries
// autoload everything in given folder
// autoload when class is being instantiate
// so any class instatiate will trigger this function
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php'; 
});