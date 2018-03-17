<?php

class User {
    public static $count = 0;

    public function __construct() {
        echo 'User created <br>';
        self::$count++;
    }
}


$userOne = new User();
$userTwo = new User();

echo User::$count;