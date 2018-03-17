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
// autoload evberything in given folder
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php'; 
});