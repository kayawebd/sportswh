<!-- css: FormStyle  js:formValidation -->
<div class="checkoutContainer cartWrapper">
	<div class="formStyle checkoutForm">
		<form action="thanks.php" method="post" id="checkoutForm" name="checkoutForm">
			<h2 class="form__title">
				Delivery Details
			</h2>
			<div class="inputs">
				<label class="input-label" for="firstName">First Name:</label>
				<input type="text" id="firstName" name="firstName" placeholder="e.g. John">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="lastName">Last Name:</label>
				<input type="text" id="lastName" name="lastName" placeholder="e.g. Smith">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="address">Address</label>
				<input type="text" id="address" name="address">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="contactNumber">Phone:</label>
				<input type="number" id="contactNumber" name="contactNumber">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="email">Email:</label>
				<input type="text" id="email" name="email">
				<small></small>
			</div>

			<h2 class="form__title">
				Payment
			</h2>

			<div class="inputs">
				<label class="input-label" for="creditCardNumber">Creditcard Number:</label>
				<input type="number" id="creditCardNumber" name="creditCardNumber" placeholder="Example: 1234 5678 1234 5678">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="nameOnCard">Name On Card:</label>
				<input type="text" id="nameOnCard" name="nameOnCard">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="expiryDate">Expiry Date:</label>
				<input type="month" id="expiryDate" name="expiryDate">
				<small></small>
			</div>

			<div class="inputs">
				<label class="input-label" for="csv">CSV:</label>
				<input type="number" id="csv" name="csv" placeholder="e.g. 123">
				<small></small>
			</div>

			<div class="form__buttonWrapper">
				<button type="submit" id="submitButton" class="form__submitButton" name="pay">
					<span>Submit</span>
				</button>
			</div>
		</form>
	</div>

	<div class="column-summary">
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
</div>