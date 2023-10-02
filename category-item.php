<?php include "inc/header.php";  ?>
<?php
//check if id is passed
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    //echo  $category_id;
  
    //Get the details of selected category
  
    $sql = "SELECT * FROM `tbl_food` WHERE `category_id` = $category_id";
    $result = $conn->prepare($sql);
    $result->execute();

} else {
    header("Location: " . BURL);
}



?>

<div class="container">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4"> Items</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
                while ($row = $result->fetch()) {
                    echo <<<"foodMenu"

                    <div class="col-lg-4 d-flex ftco-animate">
                        <div class="services-wrap d-flex">
                            <a href="order.php?id={$row['id']}" class="img" style="background-image: url({$row['image_name']});margin: 3%;">
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






<?php include "inc/footer.php";  ?>