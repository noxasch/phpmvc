<?php
// contain all application configuration and database parameter

// DB Params
define('DB_HOST','localhost');
define('DB_USER','YOUR_USERNAME');
define('DB_PASS','YOUR_PASSWORD');
define('DB_NAME','YOUR_DBNAME');

// App root
/*
echo 'This is the ' . basename(__FILE__) . '<br>';
// basename(__FILE__, '.php'); get filename without extension
echo 'Path to config.php: ' . __FILE__ . '<br>'; // give path to config.php
echo 'APPROOT: ' . dirname(dirname(__FILE__)) . '<br>'; // get the app root */
define('APPROOT', dirname(dirname(__FILE__))); // so that we can access the approot from anywhere
// to be used internally

// URL root 
// for linking
// define('BASEURL', 'http://localhost/phpmvc');
//define('BASEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('BASEURL', 'YOUR_SITE_URL');
//var_dump($_SERVER);
// echo 'BASEURL: ' . BASEURL . '<br>';
// to be use when calling from url

// Site name
define('SITENAME', 'YOUR_SITE_NAME');
