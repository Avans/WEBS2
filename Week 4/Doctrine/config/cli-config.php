<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
$entityManager = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';
return ConsoleRunner::createHelperSet($entityManager);
