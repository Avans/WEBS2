<?php
namespace MyNamespace;

trait MyTrait {
    public function myTrait() {
        print __TRAIT__ . "\n";
    }
}

class MyClass {
    use myTrait;

    public function myNamespace() {
        print __NAMESPACE__ . "\n";
    }
    public function myClass() {
        print __CLASS__ . "\n";
    }
    public function myFunction() {
        print __FUNCTION__ . "\n";
    }

    public function myMethod() {
        print __METHOD__ . "\n";
    }
}

$object = new MyClass();
?><pre><?php
    print __NAMESPACE__ . "\n";
    $object->myNamespace();
    print __CLASS__ . "\n";
    $object->myClass();
    print __TRAIT__ . "\n";
    $object->myTrait();
    print __FUNCTION__ . "\n";
    $object->myFunction();
    print __METHOD__ . "\n";
    $object->myMethod();
?></pre>