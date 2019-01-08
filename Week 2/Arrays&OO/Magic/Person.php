<?php


class Person
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __get($name)
    {
        if ($name === 'fullName') {
            return $this->firstName . ' ' . $this->lastName;
        }
    }

    public function __clone()
    {
        $this->lastName .= ' Jr.';
    }

    public function __wakeup()
    {
        $this->firstName = 'Woken ' . $this->firstName;
    }
}

?><pre><?php
$john = new Person("John", "Doe");
echo $john->fullName;

$son = clone $john;
echo "\n" . $son->fullName;

echo "\nUnserialized: " . unserialize('O:6:"Person":2:{s:9:"firstName";s:4:"John";s:8:"lastName";s:7:"Doe Jr.";}')->fullName;
    ?></pre>