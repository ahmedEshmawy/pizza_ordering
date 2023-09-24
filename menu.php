<?php include "inc/header.php";  ?>
<?php
//select category data
$result1 = $conn->prepare("SELECT * FROM `tbl_category`WHERE `active`= 'yes'");
$result1->execute();

//select food data

$result2 = $conn->prepare("SELECT * FROM `tbl_food`WHERE `active`= 'yes'");
$result2->execute();

?>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Our Categories</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row no-gutters d-flex">
			<?php
			while ($row = $result1->fetch()) {
			
				$id = $row['id'];
				echo <<<"foodCategories"
					
							<div class="col-lg-4 d-flex ftco-animate">
								<div class="services-wrap d-flex">
									<a href="#" class="img" style="background-image: url({$row['image_name']});"></a>
									<div class="text p-4">
										<h3>{$row['title']}</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </p>
										<p class="price">
										<a href="category-item.php?category_id=$id  " class="btn btn-white btn-outline-white">View Menu</a>
										
										</p>
									</div>
								</div>
							</div>
							
							foodCategories;
			}
			?>
		</div>
	</div>
	<!----------------------- Start menu pricing   ----------------------------->
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h2 class="mb-4">Our Menu Pricing</h2>
				<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
				<p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>

		<div class="row">
			<?php
			while ($row2 = $result2->fetch()) {
				echo <<<"foodCategory"
						<div class="col-md-6">
							<div class="pricing-entry d-flex ftco-animate">
								<div class="img" style="background-image: url({$row2['image_name']});"></div>
								<div class="desc pl-3">
									<div class="d-flex text align-items-center">
										<h3><span>{$row2['title']}</span></h3>
										<span class="price">{$row2['price']}. $</span>
									</div>
									<div class="d-block">
										<p>{$row2['description']}</p>
									</div>
								</div>
							</div>

						</div>
				foodCategory;
			}
			?>

		</div>
	</div>
	<!----------------------- End  menu pricing   ----------------------------->


</section>


<?php include "inc/footer.php";  ?>