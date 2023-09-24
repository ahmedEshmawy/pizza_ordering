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
       print_r($row);
      
   
  }else {
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
                <form action="#" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-md-9">
                        
                    <legend>Selected Food</legend>

                    <div class="form-group">
                        <img src="<?=$row['image_name']?>" alt="image" class="">
                    </div>
    
                    <div class="form-group">
                        <h3><?=$row['title']?></h3>
                        <p class="">Price <?=$row['price']?></p>

                        <div class="">Quantity</div>
                        <input type="number" name="qty" class="" value="1" required>
                        
                    </div>

            
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number">
                            </div>
                       
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                           
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control"
                            placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Confirm Order" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






















<?php include "inc/footer.php"; ?>