<?php include "inc/header.php"; ?>
<?php
//check if id is passed or not
if (isset($_GET['id'])) {
    //get the food id and details of the selected food
    $id = $_GET['id'];
    echo $id;
    //Get the details of selected food
    $sql = "SELECT * FROM `tbl_food` WHERE `id` = $id";
    $result = $conn->prepare($sql);
    $result->execute();
    $row = $result->fetch();
   // print_r($row);


} else {
    //redirect to homepage
    header("Location: " . BURL);
    die();
}
?>

<section class="ftco-section contact-section">
    <div class="container mt-5">
        <div class="row block-9">

            <div class="col-md-3"></div>
            <div class="col-md-6 ftco-animate">
                <form action="handelers/handelOrder.php" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-md-9">
                            
                            <legend>Selected Food</legend>

                            <div class="form-group">
                                <img src="<?= $row['image_name'] ?>" alt="image" style="width:250px ; height: 250px;">
                            </div>

                            <div class="form-group">
                                <h3>
                                    <?= $row['title'] ?>
                                </h3>
                                <input type="hidden" name="food_title" value="<?= $row['title'] ?>">

                                <p class="">Price
                                    <?= $row['price'] ?>
                                </p>
                                <input type="hidden" name="price" value="<?= $row['price'] ?>">

                                <div class="">Quantity</div>
                                <input type="number" name="qty" class="" value="1" required>

                            </div>


                            <div class="form-group">
                                <input type="text" name="fullName" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Your Email" required>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="address" id="" cols="30" rows="7" class="form-control"
                            placeholder="Address" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






















<?php include "inc/footer.php"; ?>