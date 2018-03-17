<?php

/**
 * abstract class are class with general atrributes
 * does not meant to be instantiated
 * cannot be instantiated
 * are meant to be inherited (via extends)
 **/

abstract class Animal {

    /**
     * abstract method MUST be empty
     * are meant to be override
     * subclass MUST implement abstract method
     */
    abstract public function move();
}

// Will cause an error
$animal = new Animal();



class Bird extends Animal {
    private $name;

    public function move() {
        echo "walk...";
    }

}