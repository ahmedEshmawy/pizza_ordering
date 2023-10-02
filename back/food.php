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
                <h4 class="page-title">Food</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Food</li>
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
            <a href="food-add.php" class="card-title m-b-0 btn btn-primary lg">Add Food</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Featured</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $result = $conn->query("SELECT * FROM `tbl_food`");
                $count = $result->rowCount();
                while ($row = $result->fetch()) :
                    if ($count > 0) :

                ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?php echo $row['title'] ?></td>
                            <td><img src="<?= BURL ?><?= $row['image_name'] ?>" style="width:50 px;
                            height:50px;" alt="food pic" /></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td>
                                <?php
                                $id = $row['category_id'];
                                $result2 = $conn->prepare("SELECT `title` FROM `tbl_category`WHERE `id`=$id");

                                $result2->execute();
                                while ($row2 = $result2->fetch()) {
                                    echo $row2['title'];
                                }

                                ?>
                            </td>
                            <td><?= $row['featured'] ?></td>
                            <td><?= $row['active'] ?></td>

                            <td>
                                <a href="<?= BURLA ?>food-edit.php?id=<?= $row['id'] ?>" class="badge badge-secondary">Update</a>
                                <a href="<?= BURLA; ?>handelers/food/delete-food.php?id=<?= $row['id']; ?>&image_name=<?= $row['image_name'] ?> " class="badge badge-danger">Delete</a>
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