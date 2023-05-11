<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php include "inc/header.php";  ?>
<!-- End Topbar header -->

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
                    <form action="handelers/food/add-food.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Food Info</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" placeholder="Title Here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Select Image</label>
                                <div class="col-md-9">

                                    <div class="custom-file " style="margin-bottom: 20%">
                                        <!-- preview image before upload -->
                                        <input type=file name="image" oninput="pic.src=window.URL.createObjectURL(this.files[0])" required>
                                        <img src="" id="pic" width="100px" height="100px" alt="Preview Image" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Price </label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="price" placeholder="Price Here">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Category </label>
                                <div class="col-md-9">
                                    <select name="category">
                                        <?php
                                        $cat = $conn->prepare("SELECT * FROM `tbl_category`WHERE `active`= 'yes'");
                                        $cat->execute();
                                        $count = $cat->rowCount();

                                        if ($count > 0) {
                                            while ($category = $cat->fetch()) : ?>

                                                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>


                                            <?php endwhile;
                                        } else { ?>
                                            <option value="0">No Category found </option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Description </label>
                                <div class="col-md-9">
                                    <textarea name="description" cols="40" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Featured </label>
                                <div class="col-md-9">
                                    <div>
                                        <input type="radio" name="featured" value="yes" required>
                                        <label>Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="featured" value="no" required>
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label"> Active </label>
                                <div class="col-md-9">
                                    <div>
                                        <input type="radio" name="active" value="yes" required>
                                        <label>Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="active" value="no" required>
                                        <label>No</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="submit" class="btn btn-primary" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









<?php include "inc/footer.php"; ?>