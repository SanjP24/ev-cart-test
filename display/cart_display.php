<html>
<head>
	<title>ezyVet Cart Test</title>
</head>
<body>
	List of Products:
	<br>
	<table>
		<th>Product</th>
		<th>Price</th>
		<td></td>

	<?php 
		foreach ($products as $product => $details) {
			?>
			<tr>
				<td><?=$details['name'] ?></td>
				<td>$<?= number_format($details['price'], 2); ?></td>
				<td><button class='add' data-product='<?=$product?>'>Add to cart</button></td>
			</tr>
			<?php
		}
	?>
	</table>
	
	<br><br>

	Cart:
		<table>
			<tr>
				<th>Product</th>
				<th>Price per item</th>
				<th>Quantity</th>
				<th>Total</th>
				<td></td>
			</tr>
			<?php
			foreach ($cartItems as $productID => $productDetails) {
				?>
				<tr id="product<?=$productID?>" >
					<td><?=$productDetails["name"]?></td>
					<td>$<?=number_format($productDetails["price"], 2)?></td>
					<td><?=$productDetails["quantity"]?></td>
					<td>$<?=number_format($productDetails["price"] * $productDetails["quantity"], 2)?></td>
					<td><button class='remove' data-product='<?=$productID?>'>Remove from cart</button></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td></td>
				<td></td>
				<td><b>Total</b></td>
				<td>$<?=$cartTotal?></td>
				<td></td>
			</tr>
		</table>		
	<br>

	<script src="../node_modules/jquery/dist/jquery.min.js"></script>

	<script>
	$( ".add" ).click(function() {
		var id = $(this).data("product");
		$.post( "../cart_ajax.php", { productID: id, action: "add" })
			.done(function(data) {
				location.reload();
		});
	});

	$( ".remove" ).click(function() {
		var id = $(this).data("product");
		$.post( "../cart_ajax.php", { productID: id, action: "remove" })
			.done(function(data) {
				location.reload();
				
		});
	});
	</script>

</body>
</html>