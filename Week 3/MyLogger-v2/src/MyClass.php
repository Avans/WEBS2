<?php
namespace App;

class MyClass
{
    private $log;

    public function __construct()
    {
        $this->log = new \Monolog\Logger('MyLogger');
        $this->log->pushHandler(new \Monolog\Handler\StreamHandler('app.log', \Monolog\Logger::WARNING));
    }

    public function log()
    {
        $this->log->addWarning('Foo');
    }
}