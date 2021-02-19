<?php

class Cart {

	protected $cartProducts;

	private $productList;


	function __construct() {
		if (isset($_SESSION['cart'])) {
			$this->cartProducts = $_SESSION['cart'];
		} else {
			$this->cartProducts = [];
			$_SESSION['cart'] = $this->cartProducts;
		}
		include __DIR__.'/../products_config.php';
		$this->productList = $products;
	}

	public function addProduct(int $id){

		if (!array_key_exists($id, $_SESSION['cart'])) { // product has not been added to cart
			$product = $this->productList[$id];

			$_SESSION['cart'][$id] = array(
				"name" => $product["name"],
				"price" => $product["price"],
				"quantity" => 1
				);
		} else { // product has been added to cart already; update quantity
			$_SESSION['cart'][$id]['quantity']++;
		}
		$this->cartProducts = $_SESSION['cart'];

		echo "Product has been added";
	}

	public function removeProduct(int $id){
		$product = $this->productList[$id];

		if (!array_key_exists($id, $_SESSION['cart'])) { // product has not been added to cart
			echo 'Product has not been added to cart';
		} else { // product has been added to cart already; update quantity;
			unset($_SESSION['cart'][$id]);
			$this->cartProducts = $_SESSION['cart'];
			echo 'Product has been removed';
		}
	}

	public function getProducts() {
		return $this->cartProducts;
	}

	public function getCartTotal() {
		$total = 0;
		foreach ($this->cartProducts as $productID => $details) {
			$total += $details['price'] * $details['quantity'];
		}

		return number_format($total, 2);
	}
}