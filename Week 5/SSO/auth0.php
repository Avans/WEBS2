<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Auth0\SDK\Auth0;

return new Auth0([
    'domain' => $domain = 'webs2.eu.auth0.com',
    'client_id' => $client_id = '97AVnPbb7TvwKQJVWsqrdZ1GGcLXjzm0',
    'client_secret' => 'Gv1lNBNQu6EdgVzNoleNkvW97kj0ke36_hcJaeKC2Q0pF_UPKkh4raUC8S5uKlp8',
    'redirect_uri' => 'http://' . $_SERVER['HTTP_HOST'] . '/callback',
    'audience' => 'https://webs2.eu.auth0.com/userinfo',
    'scope' => 'openid profile',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
]);
