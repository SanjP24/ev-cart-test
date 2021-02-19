<?php
session_start();

include 'products_config.php';

include 'classes/Cart_class.php';

if ($_POST['action'] == 'add') {
	$cart = new Cart();

	$cart->addProduct($_POST['productID']);

} 

if ($_POST['action'] == 'remove') {
	$cart = new Cart();

	$cart->removeProduct($_POST['productID']);


}