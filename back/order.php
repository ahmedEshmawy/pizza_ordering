<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php include "inc/header.php"; ?>
<!-- End Topbar header -->

<?php include "inc/sidebar.php"; ?>


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Order</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             <!-- show session msg -->
             <?php if (isset($_SESSION['msg'])):?>
                      
                      <div class="alert alert-success">
                          <?php echo $_SESSION['msg'] ?>
                      </div>
              <?php    
                  unset($_SESSION['msg']);
              endif;
              ?>

        </div>
        <table class="table">
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col"> Phone</th>
                    <th scope="col"> email</th>
                    <th scope="col"> Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $result = $conn->query("SELECT * FROM `tbl_order` ORDER BY `id` DESC ");
                $count = $result->rowCount();
                while ($row = $result->fetch()):
                    if ($count > 0):

                        ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td>
                                <?= $row['food_title'] ?>
                            </td>
                            <td>
                                <?= $row['price'] ?>
                            </td>
                            <td>
                                <?= $row['qty'] ?>
                            </td>
                            <td>
                                <?= $row['total'] ?>
                            </td>
                            <td>
                                <?= $row['order_date'] ?>
                            </td>
                            <?php if ($row['status'] == "Ordered"): ?>
                                <td>
                                    <span class="badge badge-success"><?= $row['status'] ?></span>
                                </td>
                            <?php elseif ($row['status'] == "On Delivery"): ?>
                                <td>
                                    <span class="badge badge-warning"><?= $row['status'] ?></span>
                                </td>
                            <?php elseif ($row['status'] == "Delivered"): ?>
                                <td>
                                    <span class="badge badge-success"><?= $row['status'] ?></span>
                                </td>
                            <?php elseif ($row['status'] == "Canceled"): ?>
                                <td>
                                    <span class="badge badge-danger"><?= $row['status'] ?></span>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?= $row['status'] ?>
                            </td>
                            <td>
                                <?= $row['customer_name'] ?>
                            </td>
                            <td>
                                <?= $row['customer_contact'] ?>
                            </td>
                            <td>
                                <?= $row['customer_email'] ?>
                            </td>
                            <td>
                                <?= $row['customer_address'] ?>
                            </td>

                            <td>
                                <a href="<?=BURLA?>order-edit.php?id=<?= $row['id'] ?>" class="badge badge-secondary">Update</a>
                              
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">
                                <?= "No data Found " ?>
                            </td>
                        </tr>
                    <?php endif; ?>

                <?php endwhile; ?>


            </tbody>
        </table>
    </div>
</div>









<?php include "inc/footer.php"; ?>