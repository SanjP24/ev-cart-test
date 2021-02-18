<?php
include 'products_config.php';
?>
<!-- list products -->
<html>
<head>
	<title>ezyVet Cart Test</title>
</head>
<body>
List of Products:
<?php foreach ($products as $product => $details) {
	?>
	<b><?=$details['name'] ?> -> $<?= number_format($details['price'], 2); ?></b> Add to cart
	<br>
	<?php
}

?>
</body>
</html>