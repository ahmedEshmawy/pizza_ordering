<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tbl_order` WHERE `id` = $id ";
    $result = $conn->prepare($sql);
    $result->execute();
    $row = $result->fetch();
}else {
    header('location:' . BURLA . 'order.php');
    die();
}

?>
<?php  include "inc/header.php";  ?>
<?php  include "inc/sidebar.php"; ?>

 <div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <!-- show session msg -->
                    <?php if (isset($_SESSION['msg'])):?>
                      
                            <div class="alert alert-success">
                                <?php echo $_SESSION['msg'] ?>
                            </div>
                    <?php    
                        unset($_SESSION['msg']);
                    endif;
                    ?>
                    <form action="handelers/order/order-update.php?id=<?php echo $row['id'] ?>"           method="POST"  class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title"> Edit Order </h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="food_title" value="<?= $row['food_title'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="qty" value="<?= $row['qty'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Total</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="total" value="<?= $row['total'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Order Date</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="order_date" value="<?= $row['order_date'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                <div class="col-md-9">
                                   
                                    <select name="status" >
                                        <option <?php if($row['status'] == "Ordered") echo "selected";?> value="Ordered">Ordered</option>
                                        <option <?php if($row['status'] == "On Delivery") echo "selected";?> value="On Delivery">On Delivery</option>
                                        <option <?php if($row['status'] == "Delivered") echo "selected";?>  value="Delivered">Delivered</option>
                                        <option <?php if($row['status'] == "Canceled") echo "selected";?>  value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="customer_name" value="<?= $row['customer_name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="customer_contact" value="<?= $row['customer_contact'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="customer_email" value="<?= $row['customer_email'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">customer Address</label>
                                <div class="col-md-9">
                                    <textarea name="customer_address" id="" cols="30" rows="5"><?= $row['customer_address']?>
                                    </textarea>
                                </div>
                            </div>                          


                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 


<?php include "inc/footer.php"; ?>