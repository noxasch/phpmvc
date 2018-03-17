<?php

class User {
    private $name;
    private $age;
    public $id;

    /**
     * setter and getter
     */
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        echo $this->name;
    }

    public function __get($property) {
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
    
    

}

class Susbcriber extends User {
    
    // method overriding
    public function getName() {
        parent::getName(); // equivalent to super.methodName() 
        echo " from subclass.";

        $this->name = 'test';
    }
}

$user = new User();
$user->setName('Brad');
$user->getName();
echo "<br> Get: ";
echo $user->__get('name');
var_dump($user->__set('name', 'Michael'));

// public property can be access from outside
// but not best practice 
// as oop concept to use encapsulation
$user->id = 1;

$subscriber = new Susbcriber();
var_dump($subscriber);
$subscriber->setName('John');
$subscriber->getName();
