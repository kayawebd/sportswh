<!-- css: FormStyle  js:formValidation -->

<div class="formStyle checkoutForm">
	<form action="thanks.php" method="post" id="checkoutForm" name="checkoutForm">
		<h2 class="form__title">
			Delivery Details
		</h2>
		<div class="inputs">
			<label class="input-label" for="firstName">First Name:</label>
			<input type="text" id="firstName" name="firstName" placeholder="John">
			<small></small>
		</div>

		<div class="inputs">
			<label class="input-label" for="lastName">Last Name:</label>
			<input type="text" id="lastName" name="lastName" placeholder="Smith">
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
			<input type="number" id="creditCardNumber" name="creditCardNumber" placeholder="1234 5678 1234 5678">
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
			<input type="number" id="csv" name="csv" placeholder="123">
			<small></small>
		</div>

		<div class="form__buttonWrapper">
			<button type="submit" id="submitButton" class="form__submitButton" name="pay">
				<span>Submit</span>
			</button>
		</div>
	</form>
</div>