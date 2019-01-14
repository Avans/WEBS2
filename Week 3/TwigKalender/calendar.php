<?php
require __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . 'views');
$twig = new Twig_Environment($loader);

echo $twig->render('calendar.twig', [
    'calendar' => new \Calendar\Calendar(new \DateTime(date("Y-1-1")), ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"])
]);