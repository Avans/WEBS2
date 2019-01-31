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
/**
 * @var $user WsphpGebruikers
 */
foreach ($result as $user)  {
    $voornaam = $user->getGebVoornaam();
    echo '<br />' . $voornaam . ' ' . $user->getGebAchternaam();
    if (substr($voornaam, 0, 4) === 'EDIT') {
        $user->setGebVoornaam(substr($user->getGebVoornaam(), 5));
    } else {
        $user->setGebVoornaam('EDIT ' . $user->getGebVoornaam());
    }
    $entityManager->persist($user);
}
$entityManager->flush();

$entityManager->close();
