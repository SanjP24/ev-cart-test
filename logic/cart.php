<?php
error_reporting(E_STRICT);

include __DIR__.'/../products_config.php';

include __DIR__.'/../classes/Cart_class.php';

$cart = new Cart();

$cartItems = $cart->getProducts();

$cartTotal = $cart->getCartTotal();

include __DIR__.'/../Display/cart_display.php';
