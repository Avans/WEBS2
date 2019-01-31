<?php

/**
 * @var $entityManager \Doctrine\ORM\EntityManager
 */
$entityManager = require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';


print "Connectie met database gemaakt.";

$queryBuilder = $entityManager->createQueryBuilder();
$queryBuilder->select('gebruiker');
$queryBuilder->from('WsphpGebruikers', 'gebruiker');
$query = $queryBuilder->getQuery();
try {
    $result = $query->getResult();
} catch (\Doctrine\ORM\Query\QueryException $exception) {
    exit ($exception->getMessage());
}

print '<br />' . 'Gebruikers presenteren via Doctrine Entities:';
foreach ($result as $object)  {
    echo '<br />' . $object->getGebVoornaam() . ' ' . $object->getGebAchternaam();
}

$entityManager->close();
