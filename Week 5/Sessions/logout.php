<?php
session_start();
unset($_SESSION['email']);
session_destroy();
header('Location: profile.php', true, 302);
