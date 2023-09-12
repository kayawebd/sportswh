<section class="shoppingCart cartWrapper">
	<div class="column-cart">
		<div class="shoppingCart__table">
			<?php
			if (isset($_SESSION["cart"])) {
				$cart = $_SESSION["cart"];
				$cartItems = $cart->getItems();
				$numberOfCartItems = count($cartItems);
				$subtotal = sprintf('%01.2f', $cart->calculateTotal());
				$total = sprintf('%01.2f', $cart->calculateTotal());
				if ($numberOfCartItems > 0) {
					$numberOfCartItems = count($cartItems);
				} else {
					$numberOfCartItems == 0;
				}
			} else {
				$numberOfCartItems = 0;
				$subtotal = 0;
				$total = 0;
			}
			?>
			<h2>Your Shopping Cart (<?= $numberOfCartItems ?>)</h2>
			<?php
			if ($numberOfCartItems == 0) {
			?><div class="emptyCart_text">
					<p>Your shopping cart is currently empty. </p>
					<p>Please visit our <a href="./products.php">PRODUCTS</a> page to add items.</p>
				</div>
				<?php
			} else {
				foreach ($cartItems as $item) :
					$productName = $item->getItemName();
					$price = sprintf('%01.2f', $item->getPrice());
					$salePrice = $item->getSalePrice();
					$productId = $item->getItemId();
					$productPhoto = $item->getProductPhoto();
					$qty = $item->getQuantity();
				?>
					<div class="shoppingCart__row">
						<div class="shopppingCart__row_image">
							<img src="./assets/images/product-images/<?= $productPhoto ?>" alt="">
							<form action="shopping.php" method="post" class="shoopingCart__edit">
								<input type="submit" name="remove" value="Remove" class="shoppingCart__link">
								<input type="hidden" value="<?= $productId ?>" name="productId">
							</form>
						</div>
						<div class="shoppingCart__row_info">
							<div class="shoppingCart__row_itemDetails">
								<?= $productName ?>
							</div>
							<div class="shoppingCart__row_quantity">
								<div class="counter">
									<span class="down" onClick='decreaseNumber(event, this)'>
										<i class="fa-solid fa-minus"></i>
									</span>
									<input type="number" value="<?= $qty ?>" name="qty" class="shoppingCart__quantity-input">
									<span class="up" onClick='increaseNumber(event, this)'>
										<i class="fa-solid fa-plus"></i>
									</span>
								</div>
							</div>
							<?php
							if ($salePrice > 0) {
							?>
								<div class="shoppingCart__row_salePrice product__price-onSale">$<?= $salePrice ?></div>
								<div class="shoppingCart__row_price"><del>$<?= $price ?></del></div>
							<?php
								$price = $salePrice;
							} else {
							?>
								<div class="shoppingCart__row_price">$<?= $price ?></div>
								<div class="shoppingCart__row_salePrice product__price-onSale"> </div>
							<?php
							}
							?>


							<div class="shoppingCart__row_totalPrice">$<?= $qty * $price ?></div>

						</div>

					</div>

				<?php endforeach; ?>
			<?php
			}
			?>

		</div>
	</div>

	<div class="column-summary">
		<div class="column-summary-payment">
			<h2>Summary:</h2>
			<div class="orderDetail">
				<div class="orderDetail__subtotal">
					<div class="columnLeft">Subtotal</div>
					<div class="columnRight"><?= $subtotal ?></div>

				</div>
				<div class="orderDetail__shipping">
					<div class="columnLeft">Shipping</div>
					<div class="columnRight">$0</div>
				</div>
				<div class="orderDetail__promo">
					<div class="columnLeft">Discount</div>
					<div class="columnRight">$0</div>
				</div>
				<div class="orderDetail__total">
					<div class="columnLeft">Total</div>
					<div class="columnRight"><?= $total ?></div>
				</div>
				<div class="shoppingCart__btnDiv">
					<a href="checkout.php"><button class="shoppingCart__btn" role="button">Checkout</button></a>
				</div>
			</div>
		</div>
	</div>

</section>

<div class="recommendedProductContainer">
	<div class="siteWrapper">
		<?php
		require_once "./classes/DBAccess.php";
		include "./settings/db.php";
		$db = new DBAccess($dsn, $username, $password);
		$pdo = $db->connect();

		$sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item Where featured = 1";
		$stmt = $pdo->prepare($sql);
		$rows = $db->executeSQL($stmt);
		?>
		<div class="blockHeading">
			<h2>You Might Also Like</h2>
		</div>
		<div class="products">
			<?php foreach ($rows as $row) :
				if (file_exists("./assets/images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
					$photoPath = "./assets/images/product-images/" . $row["photo"];
				} else {
					$photoPath = "./assets/images/product-images/imageUnavailable.webp";
				}
				$itemId = $row["itemId"];
				$itemName = $row["itemName"];
				$photo = $row["photo"];
				$price = $row["price"];
				$description = $row["description"];
				$salePrice = $row["salePrice"];
			?>
				<article class="item">
					<a href="./productDetails.php?id=<?= $itemId ?>" class="link">
						<div class="photo-frame">
							<img src="<?= $photoPath ?>" class="photo" width="500" height="500" alt="<?= $itemName ?>">
						</div>
						<?php
						if ($salePrice <= 0) {
						?><p class="price">$<?= $price ?></p>
						<?php
						} else {
						?>
							<p class="price"><span class="price-onSale">$<?= $salePrice ?></span>
								<span class="priceDescription
                            ">was</span>
								<del>$<?= $price ?></del>
							</p>
						<?php
						}
						?>
						<h3 class="heading"><?= $itemName ?></h3>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</div>