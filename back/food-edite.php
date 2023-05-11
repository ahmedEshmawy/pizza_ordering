<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_food` WHERE `id` = $id ";
$result = $conn->prepare($sql);
$result->execute();
$row = $result->fetch();


//select category name
$sql2 = "SELECT * FROM `tbl_category`WHERE `active`='yes'";
$stmt = $conn->prepare($sql2);
$stmt->execute();

?>
<?php include "inc/header.php";  ?>
<?php include "inc/sidebar.php"; ?>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <!-- show session msg -->
                    <?php if (isset($_SESSION['msg'])) :
                        foreach ($_SESSION['msg'] as $msg) : ?>
                            <div class="alert alert-danger">
                                <?php echo $msg ?>
                            </div>
                    <?php endforeach;
                        unset($_SESSION['msg']);
                    endif;
                    ?>
                    <form action="handelers/food/update-food.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title"> Edit Food </h4>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Category Name </label>
                                <div class="col-md-9">
                                    <select name="category_id">
                                        <?php while ($row2 = $stmt->fetch()) :
                                            if ($row['category_id'] == $row2['id']) {
                                        ?>
                                                <option value="<?= $row2['id'] ?> " selected><?= $row2['title'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $row2['id'] ?> "><?= $row2['title'] ?></option>
                                        <?php  };
                                        endwhile;
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" value="<?= $row['title'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Select Image</label>
                                <div class="col-md-9">

                                    <div class="custom-file " style="margin-bottom: 10%">
                                        <!-- preview image before upload -->
                                        <input type=file name="image" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        <img src="<?= BURL ?><?= $row['image_name'] ?>" id="pic" width="100px" height="100px" alt="Preview Image" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Description </label>
                                <div class="col-md-9">
                                    <textarea name="description" cols="40" rows="5"><?= $row['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Price </label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="price" value="<?= $row['price'] ?>" placeholder="Price Here">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Featured </label>
                                <div class="col-md-9">

                                    <div>
                                        <input <?php if ($row['featured'] == "yes") echo "checked"; ?> type="radio" name="featured" value="yes" required>
                                        <label>Yes</label>
                                    </div>
                                    <div>
                                        <input <?php if ($row['featured'] == "no") echo "checked"; ?> type="radio" name="featured" value="no" required>
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Active </label>
                                <div class="col-md-9">
                                    <div>
                                        <input <?php if ($row['active'] == "yes") echo "checked"; ?> type="radio" name="active" value="yes" required>
                                        <label>Yes</label>
                                    </div>
                                    <div>
                                        <input <?php if ($row['active'] == "no") echo "checked"; ?> type="radio" name="active" value="no" required>
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="border-top">
                            <div class="card-body">
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