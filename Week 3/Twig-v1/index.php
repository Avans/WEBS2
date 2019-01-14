<?php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . 'views');
$twig = new Twig_Environment($loader);

echo $twig->render('index.twig', ['name' => 'World']);