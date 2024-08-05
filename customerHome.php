<?php
include 'customerHeader.php';

require_once 'connection.php';
$sql = "SELECT * FROM instrument where status = 1 AND quantity > 0";
$data_all = $conn->query($sql);
?>

<div class="card m-3 p-3">
	<div class="topic ms-5">
		<div class="row">
			<div class="col-10">
				<h3>Instrument List</h3>
			</div>
			<div class="col-2">
				<h3 class="text-center p-3" style="border: 1px solid black; border-radius: 50%; display: inline-block;" onclick="cartOpen()">
					<i class="fa-solid fa-cart-shopping"></i>
				</h3>

			</div>
		</div>

	</div>
	<div class="contentBody mt-3 mx-auto">
		<div class="row justify-content-center">

			<?php
			while ($row = mysqli_fetch_assoc($data_all)) {
				?>

				<div class="col-lg-3 col-md-6 text-center m-3 p-3"
					style="width: 350px; box-shadow: 3px 4px 8px rgba(0, 0, 0, 0.1);">
					<div class="single-product-item">
						<div class="product-image">
							<a href=""><img src="<?php echo $row["image"] ?>" alt=""
									style="width: 150px; height: 150px;"></a>
						</div>
						<h3>
							<?php echo $row["name"] ?>
						</h3>
						<p class="product-price" style="font-weight: 700; color:purple;"> $
							<?php echo $row["price"] ?>
						</p>
						<p>
							<?php echo $row["category"] ?>
						</p>
						<!-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
						<button class="btn btn-warning"
							onclick="addToCart('<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>')">Add
							to Cart</button>
					</div>
				</div>

				<?php
			}
			?>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>