<?php

$auth0 = require __DIR__ . DIRECTORY_SEPARATOR . 'auth0.php';

$userInfo = $auth0->getUser();

if (!$userInfo) {
    ?><a class="btn btn-primary btn-lg btn-login btn-block" href="login.php">SignIn</a><?php
    exit;
}

?>
<html>
<body class="home">
<div><?php echo $userInfo['name'] ?></div>
    <a class="btn btn-primary btn-lg btn-login btn-block" href="logout.php">Logout</a>
</body>
</html>
<?php