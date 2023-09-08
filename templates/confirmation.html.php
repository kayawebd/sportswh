<div>
	<?php if ($orderId > 0) : ?>
		<p>Thank you <?= $firstName ?>, your order number is <?= $orderId ?></p>
	<?php else : ?>
		<p>Something went wrong and the order was not placed</p>
	<?php endif; ?>
	<p><a href="index.php">Back to the start</a></p>
</div>