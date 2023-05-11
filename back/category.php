<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php include "inc/header.php";  ?>
<!-- End Topbar header -->

<?php include "inc/sidebar.php"; ?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Category</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <!-- show session msg -->
        <?php if (isset($_SESSION['msg'])) : ?>

            <div class="alert alert-success ">
                <?php echo $_SESSION['msg'] ?>
            </div>
        <?php
            unset($_SESSION['msg']);
        endif;
        ?>
        <div class="card-body">
            <a href="category-add.php" class="card-title m-b-0 btn btn-primary lg">Add Category</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Featured</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM `tbl_category`");
                $i = 1;
                $count = $result->rowCount();

                while ($row = $result->fetch()) :
                    //check if there is data in the admin table
                    if ($count > 0) : ?>
                        <tr>
                            <th scope=""><?= $i++; ?> </th>
                            <td><?= $row['title'] ?></td>
                            <td><img src="<?= BURL ?><?= $row['image_name'] ?> " style="width: 60px; height: 60px;" alt="category image"></td>
                            <td><?= $row['featured'] ?></td>
                            <td><?= $row['active'] ?></td>
                            <td>

                                <a href="<?php echo BURLA; ?>category-edite.php?id=<?php echo $row['id'] ?>" class="badge badge-secondary">Update</a>
                                <a href="<?php echo BURLA; ?>handelers/category/delete-category.php?id=<?php echo $row['id']; ?>&image_name=<?php echo $row['image_name'] ?> " class="badge badge-danger">Delete</a>

                            </td>

                        </tr>
                    <?php else : ?>

                        <tr>
                            <td colspan="3"><?= "No data Found " ?> </td>
                        </tr>

                    <?php endif; ?>

                <?php endwhile; ?>




            </tbody>
        </table>
    </div>
</div>





<?php include "inc/footer.php"; ?>