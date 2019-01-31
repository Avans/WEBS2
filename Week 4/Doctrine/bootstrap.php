<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
$connectionParameters = require __DIR__ . DIRECTORY_SEPARATOR . 'credentials.php';
$config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration([__DIR__ . DIRECTORY_SEPARATOR . "entities"], true, null, null, false);
return Doctrine\ORM\EntityManager::create($connectionParameters, $config);