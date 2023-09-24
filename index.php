<?php include "inc/header.php";  ?>


<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
	<div class="one-half ftco-animate">
		<div class="heading-section ftco-animate ">
			<h2 class="mb-4">Welcome to <span class="flaticon-pizza">Pizza</span> A Restaurant</h2>
		</div>
		<div>
			<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
		</div>
	</div>
</section>

<section class="ftco-section ftco-services">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Our Services</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-diet"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Healthy Foods</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-bicycle"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Fastest Delivery</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-pizza-1"></span></div>
					<div class="media-body">
						<h3 class="heading">Original Recipes</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<h2 class="mb-4">Hot Pizza Meals</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row no-gutters d-flex">
			<?php
			//select food item from database that are active and featured( appear in the home page)
			$result = $conn->prepare("SELECT * FROM `tbl_food`
									  WHERE `active`='yes' AND `featured`='yes'
			 						  LIMIT 6");
			$result->execute();
			while ($row = $result->fetch()) {
				echo <<<"foodMenu"

				<div class="col-lg-4 d-flex ftco-animate">
					<div class="services-wrap d-flex">
						<a href="#" class="img" style="background-image: url({$row['image_name']});margin: 3%;">
						</a>
						<div class="text p-4 m-3">
							<h3>{$row['title']}</h3>
							<p>{$row['description']} </p>
							<p class="price">
							 <span>{$row['price']}.$</span> 
							 <a href="order.php?id={$row['id']}" class="ml-2 btn btn-white btn-outline-white">Order Now</a>
							 </p>
						</div>
					</div>
				</div>	
			foodMenu;
			}
			?>
		</div>
	</div>



</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-pizza-1"></span></div>
								<strong class="number" data-number="100">0</strong>
								<span>Pizza Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-medal"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-laugh"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-chef"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>





<?php include "inc/footer.php";  ?>