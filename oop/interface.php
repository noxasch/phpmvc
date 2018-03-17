<?php
/**
 * Interface Example
 */

interface People {
    public function talk();
    public function walk();
}

/**
 * A Class MUST implements all the method
 * from an interface it using
 * all method in an interface are abstract (empty)
 */
class Person implements People {


    public function talk() {
        echo "Hello World";
    }
    public function walk() {
        echo "Walking...";
    }
}

