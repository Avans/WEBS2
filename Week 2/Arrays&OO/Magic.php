<?php


class Magic
{
    public function __construct()
    {
        $this->instance = ++self::$instances;
        echo "Object {$this->instance} created\n";
    }
    public function __destruct()
    {
        echo "Object#{$this->instance} destroyed\n";
    }

    public function __call($name, $arguments)
    {
        echo "Method $name is being called with " . count($arguments) . " arguments\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Static method $name is being called with " . count($arguments) . " arguments\n";
    }

    public function __get($name)
    {
        echo "Trying to get property $name\n";
        return 4;
    }

    public function __set($name, $value)
    {
        echo "Trying to set property $name to $value\n";
    }

    public function __isset($name)
    {
        return false;
    }

    public function __unset($name)
    {
        echo "Trying to unset property $name\n";
    }

    public function __sleep()
    {
        echo "I feel sleepy\n";
        return ["instance"];
    }

    public function __wakeup()
    {
        $this->instance = ++self::$instances;
        echo "Rise and shine as object#{$this->instance}!\n";
    }

    public function __toString()
    {
        return "Object#" . $this->instance;
    }

    public function __invoke()
    {
        echo "Look at me! I'm a Closure!";
    }

    public function __debugInfo()
    {
        return ["this is object #" => $this->instance];
    }

    private $privateVar = 'val';
    public $publicVar;

    public static function __set_state($state)
    {
        $object = new self;
        $object->privateVar = $state['privateVar'];
        $object->publicVar = $state['publicVar'];
        return $object;
    }

    static $instances = 0;
    public $instance;

    public function __clone()
    {
        $this->instance = ++self::$instances;
    }

}

?><pre><?php
    echo "\n__callStatic()\n";
    Magic::executeStatic(1,2,3); 

    echo "\n\n__construct()\n";
    $object = new Magic(); //
    echo "\$object is instance no " . $object->instance . "\n";

    echo "\n__call()\n";
    $object->execute(1,2,3); 

    echo "\n\n__set()\n";
    $object->missing = 5; //
    echo "\n__get()\n";
    echo "Missing value: " . $object->missing . "\n"; 

    echo "\n\n__isset()\n";
    echo "Is property missing set? " . (isset($object->missing)?"Yes":"No"); //
    echo "\n__unset()\n";
    unset($object->missing); 

    echo "\n\n__sleep()\n";
    $serialized = serialize($object); //
    echo "\n\n__wakeup()\n";
    $object = unserialize($serialized); //
    echo "\$object is instance no " . $object->instance . "\n";

    echo "\n\n__toString()\n";
    echo $object; 

    echo "\n\n__invoke()\n";
    $object(); 

    echo "\n\n__debugInfo()\n";
    var_dump($object); 

    echo "\n\n__set_state()\n";
    $object->publicVar = 'publicValue';
    eval("\$exportedObject = " . var_export($object, true) . ";"); //
    var_dump($exportedObject);
    echo "\$exportedObject is instance no " . $exportedObject->instance . "\n";
    unset($exportedObject); // calls __destruct

    echo "\n\n__clone()\n";
    $objectClone = clone $object;
    echo "\$objectClone is instance no " . $objectClone->instance . "\n";
    unset($objectClone);

    echo "\n\n__deconstruct()\n";
    unset($object);
    ?></pre>