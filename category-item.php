<?php include "inc/header.php";  ?>
<?php
//check if id is passed
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    echo $category_id;

// Get the category title 
    $category_title_query = $conn->prepare("SELECT `title`
                                        FROM `tbl_category`
                                        WHERE `id` = :category_id");
    $category_title_query->bindParam(':category_id', $category_id);
    $category_title_query->execute();

    while ($row = $category_title_query->fetch()) {
        $category_title = $row['title'];
       
    }


} else {
    header("Location: " . BURL);
}



?>

<div class="container">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4"><?= $category_title ?></h2>
            
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
            //Get the food items based on the category id
            $food_items_query = $conn->prepare("SELECT * FROM `tbl_food` WHERE `category_id` = :category_id");
            $food_items_query->bindParam(':category_id', $category_id);
            $food_items_query->execute();
            //count the food items
            $count = $food_items_query->rowCount();
            if ($count > 0) {
                while ($row = $food_items_query->fetch()) {
                    echo <<<categoryItems
                    <div class="col-lg-4 d-flex ftco-animate">
                        <div class="services-wrap d-flex">
                            <a href="food-item.php?food_id={$row['id']} " class="img" style="background-image: url({$row['image_name']});"></a>
                            <div class="text p-4">
                                <h3>{$row['title']}</h3>
                                <p>{$row['description']}</p>
                                <p class="price"><span>{$row['price']}.$</span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                            </div>
                        </div>
                    </div>
                    categoryItems;
            }
        }else{
            echo "No food items found";
        }
                        ?>

        </div>
    </div>
</section>






<?php include "inc/footer.php";  ?>