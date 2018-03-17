<?php

// App root
echo __FILE__ . '<br>'; // give path to config.php
echo dirname(dirname(__FILE__)); // get the app root
define('APPROOT', dirname(dirname(__FILE__))); // sp that we can access the approot from anywhere

// URL root for linking
define('BASEURL', 'http://localhost/phpmvc');

// Site name
define('SITENAME', 'TraversyMVC');
