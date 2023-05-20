<?php include "inc/header.php";  ?>


<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php

			//get search keyword
			$search = $_POST['search'];

			//select food Item data

			$sql = $conn->prepare("SELECT * FROM `tbl_food`WHERE `title`LIKE '%$search%' OR `description`LIKE '%$search%' ");
			$sql->execute();

			$rowCount = $sql->rowCount();
			
			if ($rowCount > 0) {
				while ($row = $sql->fetch()) {
					echo <<<"foodItem"
						<div class="col-md-6">
							<div class="pricing-entry d-flex ftco-animate">
								<div class="img" style="background-image: url({$row['image_name']});"></div>
								<div class="desc pl-3">
									<div class="d-flex text align-items-center">
										<h3><span>{$row['title']}</span></h3>
										<span class="price">{$row['price']}. $</span>
									</div>
									<div class="d-block">
										<p>{$row['description']}</p>
									</div>
								</div>
							</div>

						</div>
					foodItem;
				}
			} else {
				echo "No Data Found";
			}

			?>

		</div>
	</div>
</section>






<?php include "inc/footer.php";  ?>