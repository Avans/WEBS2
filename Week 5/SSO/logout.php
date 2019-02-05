<?php
/**
 * @var $auth0 \Auth0\SDK\Auth0
 */
$auth0 = require __DIR__ . DIRECTORY_SEPARATOR . 'auth0.php';

$userInfo = $auth0->getUser();

$auth0->logout();
$return_to = 'http://' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', $domain, $client_id, $return_to);
header('Location: ' . $logout_url);
die();