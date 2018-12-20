<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'Cart.php';

$cart = new Webshop\Cart;
$cart->add_item("10", 1);