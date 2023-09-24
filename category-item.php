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
            
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
                while ($row = $result->fetch()) {
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

            ?>

        </div>
    </div>
</section>






<?php include "inc/footer.php";  ?>