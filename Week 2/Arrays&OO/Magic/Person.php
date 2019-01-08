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
}

?><pre><?php
$john = new Person("John", "Doe");
echo $john->fullName;

$son = clone $john;
echo "\n" . $son->fullName;
    ?></pre>